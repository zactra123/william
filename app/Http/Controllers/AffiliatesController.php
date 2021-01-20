<?php

namespace App\Http\Controllers;

use App\BankLogo;
use App\ClientReport;
use App\ClientReportAddress;
use App\ClientReportEmployer;
use App\ClientReportEqAccount;
use App\ClientReportEqInquiry;
use App\ClientReportEqPublicRecord;
use App\ClientReportExAccount;
use App\ClientReportExInquiry;
use App\ClientReportExPublicRecord;
use App\ClientReportExStatement;
use App\ClientReportName;
use App\ClientReportPhone;
use App\ClientReportTuAccount;
use App\ClientReportTuInquiry;
use App\ClientReportTuPublicRecord;
use App\ClientReportTuStatement;
use App\Credential;
use App\Disputable;
use App\EqualBank;
use App\Jobs\FetchReports;
use App\SecretQuestion;
use App\Services\ClientDetailsNewData;
use App\Services\PricingDetails;
use App\Services\Screaper;
use App\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

use App\User;
use App\Affiliate;
use Auth;
use App\ClientAttachment;
use App\Services\ClientDetailsData;
use Illuminate\Support\Arr;
use App\ClientDetail;
use App\UploadClientDetail;

class AffiliatesController extends Controller
{

    /**
     * AffiliatesController constructor.
     * Should access logged in users with Affiliate ("affiliate") Role
     * affiliate can create clients, view your clients list, add client credentials
     * documents and other information
     * affiliate can be view client report and dispute them
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified' ,'affiliate']);
    }

    /**
     * @return \Illuminate\View\View "affiliate.index" with @clients
     * @clients Users with role "clients" and assign affiliate
     */
    public function index()
    {
        $affiliateId = Auth::user()->id;
        $clients = Affiliate::where('affiliate_id', $affiliateId)->get();
        return view('affiliate.index', compact('clients'));
    }


    public function importantInformation(Request $request)
    {
        $userId = Auth::user()->id;
        if ($request->method() == "GET") {

            $client = User::where('id', $userId)->first();

            $secrets = DB::table('secret_questions')->select('question', 'id')->get();

            return view('affiliate.important-information', compact('client', 'secrets'));

        }elseif ($request->method() == "POST") {
            $id = Auth::user()->id;

            $affiliate = $request->except('_token');

            $full_name = explode(" ", $affiliate["full_name"]);
            $affiliate["first_name"] = array_shift($full_name);
            $affiliate["last_name"] = implode(" ", $full_name);

            $splitAddress = $this->splitAddress(str_replace([", USA", ",USA"], '', strtoupper($affiliate['address'])));

            $affiliate_details = ClientDetail::where('user_id', $id)->first();
            preg_match("/([0-9]{1,})/im", $splitAddress['street'], $number);
            $affiliateDetails ["number"] = isset($number[0])?$number[0]:null;
            $affiliateDetails['name'] = trim(str_replace($affiliateDetails ["number"], '', $splitAddress['street']));
            $affiliateDetails['city'] = $splitAddress['city'];
            $affiliateDetails['state'] = $splitAddress['state'];
            $affiliateDetails['zip'] =$splitAddress['zip'];
            $affiliateDetails['address'] = strtoupper($affiliate['address']);
            $affiliateDetails['registration_steps'] = "finished";

            User::where('id', $userId)->update([
                'first_name' => $affiliate["first_name"],
                'last_name' => $affiliate["last_name"],
                'secret_questions_id' => $affiliate["secret_questions_id"],
                'secret_answer' => $affiliate["secret_answer"]

            ]);

            ClientDetail::where('user_id', $userId)->update([
                'phone_number' => $affiliate["phone_number"],
                'number'=>$affiliateDetails ["number"],
                'name'=>$affiliateDetails ["name"],
                'city'=>$affiliateDetails ["city"],
                'state'=>$affiliateDetails ["state"],
                'zip'=>$affiliateDetails ["zip"],
                'address'=>$affiliateDetails ["address"],
                'business_name'=>$affiliate["business_name"],
                'ein'=>$affiliate["ein"],
                'ssn'=>$affiliate["ssn"],
            ]);

            return redirect()->to('/affiliate');
        }
    }

    /**
     * @return \Illuminate\View\View "affiliate.client-create" with @secrets
     * affiliate create users with role client and assign affiliate
     */
    public function createClient()
    {
        $secrets=DB::table('secret_questions')->where('user_id', null)->select('question','id')->get();
        return view('affiliate.client-create', compact('secrets'));
    }

    /**
     * Add clients documents (driver license and social security card)
     * @param Request $request
     * request structure [email:required, phone_number:required, sex:required, secret_questions_id:required, secret_answer:required]
     * @return redirect on success affiliate.client.document, on failed affiliate.create.client
     */
    public function storeClient(Request $request)
    {

        $clientData = $request->except('_token');

        $validation =  Validator::make($clientData, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone_number'=> 'required',
            'sex'=> 'required',
            'secret_questions_id' => ['required'],
            'secret_answer' => ['required', 'string'],
        ]);

        if ($validation->fails()){
            return redirect()->back()
                ->withInput()
                ->withErrors($validation);
        }

        if(isset($clientData['own_secter_question']) && $clientData['secret_questions_id'] == 'other'){
            $secreteQuestion =  SecretQuestion::create([
                'question'=>$clientData['own_secter_question']
            ]);
        }

        $affiliateId = Auth::user()->id;

        $user = User::create([
            'email'=>$clientData['email'],
            'secret_questions_id' => $clientData['secret_questions_id'],
            'secret_answer' =>$clientData['secret_answer'],
            'role'=>'client'
        ]);
        $userId = $user->id;
        if(isset($secreteQuestion)){
            SecretQuestion::whereId($secreteQuestion->id)->update([
                'user_id'=>$userId,
            ]);
        }

        ClientDetail::create([
            'user_id'=>$userId,
            'sex'=>$clientData['sex'],
            'phone_number' => $clientData['phone_number'],
            'registration_steps'=>'documents'
        ]);

        Affiliate::create([
            'affiliate_id' =>$affiliateId,
                'user_id' => $userId,
        ]);
//        $user->sendEmailVerificationNotification();
        return redirect(route('affiliate.client.document', ['client'=>$userId]));

    }


    /**
     * @return \Illuminate\View\View "affiliate.client-create-dl-ss" with @clients and @step
     * affiliate add clients document (driver license and social security card )
     */
    public function addClientDocumnet($client)
    {
        $affiliateId = Auth::user()->id;
        $a = Affiliate::where('affiliate_id', $affiliateId)
            ->where('user_id', $client)->first();

        if(empty($a)){
            return back();
        }
        $clients = User::where('id', $client)->first();
        $step = $clients->clientDetails->registration_steps;
        return view('affiliate.client-create-dl-ss', compact('clients', 'step'));
    }

    /**
     * add client document (driver license and social security)
     * call  clientDetailsNewData returns value expiration date,
     * date of birth, address (number, name, city, state, zip)
     * sex first and last name and social security number
     * @param Request $request
     * request structure [driver_license:required, social_security:required]
     * @return redirect on success affiliate.client.credentials, on failed affiliate.client.documents
     */
    public function storeDLSS(Request $request, ClientDetailsNewData $clientDetailsNewData)
    {
        $userId = $request->client;
        $affiliateId = Auth::user()->id;
        $a = Affiliate::where('affiliate_id', $affiliateId)
            ->where('user_id', $userId)->first();
        if(empty($a)){
            return back();
        }

        $client = User::where('id', $userId)->first();
        if (empty($request['driver_license']) || empty($request['social_security'])) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Please upload both files');
        }

        $imagesDriverLicense = $request->file("driver_license");
        $imagesSocialSecurity = $request->file("social_security");

        $imageExtension = ['pdf', 'gif', 'png', 'jpg', 'jpeg', 'tif', 'bmp'];
        $driverLicenseExtension = strtolower($imagesDriverLicense->getClientOriginalExtension());
        $socialSecurityExtension = strtolower($imagesSocialSecurity->getClientOriginalExtension());

        if (!in_array($driverLicenseExtension, $imageExtension) || !in_array($socialSecurityExtension, $imageExtension)) {
            return redirect()->back()->with('error', 'Please upload the correct file format (PDF, PNG, JPG)');
        }

        $path = "files/client/details/image/" . $client->id. "/";

        $nameDriverLicense = 'driver_license.' . $driverLicenseExtension;
        $nameSocialSecurity = 'social_security.' . $socialSecurityExtension;


        $imagesDriverLicense->move(public_path() . '/' . $path, $nameDriverLicense);
        $imagesSocialSecurity->move(public_path() . '/' . $path, $nameSocialSecurity);

        $pathDriverLicense = '/' . $path . $nameDriverLicense;
        $pathSocialSecurity = '/' . $path . $nameSocialSecurity;

        $resultDriverLicense = $clientDetailsNewData->getImageDriverLicense($pathDriverLicense, $nameDriverLicense, $driverLicenseExtension);
        $resultSocialSecurity = $clientDetailsNewData->getImageSocialSecurity($pathSocialSecurity, $nameSocialSecurity, $socialSecurityExtension);

        if(isset($resultDriverLicense['error']) && isset($resultSocialSecurity['error'])){
            $error = [
                'driver_license'=>'Your uploaded document is not readable or incorrect',
                'social_security'=> 'Your uploaded document is not readable or incorrect'
            ];
            return redirect()->back()->withErrors($error);
        }elseif(isset($resultDriverLicense['error'])){
            $error = [
                'driver_license'=>'Your uploaded document is not readable or incorrect'
            ];
            return redirect()->back()->withErrors($error);
        }elseif(isset($resultSocialSecurity['error'])){
            $error = [
                'social_security'=> 'Your uploaded document is not readable or incorrect'
            ];
            return redirect()->back()->withErrors($error);
        }

        $user = Arr::only($resultDriverLicense, ['first_name', 'last_name']);
        $user['user_id'] = $userId;
        $clientData =  Arr::except($resultDriverLicense, ['first_name', 'last_name']);
        $clientData['ssn'] = isset($resultSocialSecurity['ssn']) ? $resultSocialSecurity['ssn'] : '';
        $clientData["dob"] = isset($clientData['dob']) ? date('Y-m-d', strtotime($clientData['dob'])) : '';

        $clientAttachmentData = [
            [
                'user_id' => $client->id,
                'path' => $pathDriverLicense,
                'file_name' => $nameDriverLicense,
                'category' => 'DL',
                'type' => $driverLicenseExtension
            ],
            [
                'user_id' => $client->id,
                'path' => $pathSocialSecurity,
                'file_name' => $nameSocialSecurity,
                'category' => 'SS',
                'type' => $socialSecurityExtension
            ]
        ];

        if (empty(ClientAttachment::where('user_id', $client->id)->first())) {
            ClientAttachment::insert($clientAttachmentData);
        } elseif (empty(ClientAttachment::where('user_id', $client->id)->where('category', 'DL')->first())) {

            ClientAttachment::insert($clientAttachmentData[0]);
            ClientAttachment::where('user_id', $client->id)->where('category', 'SS')->update($clientAttachmentData[1]);
        } elseif (empty(ClientAttachment::where('user_id', $client->id)->where('category', 'SS')->first())) {

            ClientAttachment::insert($clientAttachmentData[1]);
            ClientAttachment::where('user_id', $client->id)->where('category', 'DL')->update($clientAttachmentData[0]);
        } else {
            ClientAttachment::where('user_id', $client->id)->where('category', 'DL')->update($clientAttachmentData[0]);
            ClientAttachment::where('user_id', $client->id)->where('category', 'SS')->update($clientAttachmentData[1]);

        }

        if ($client->clientDetails->registration_steps == 'documents') {

            $client->clientDetails->update([
                'registration_steps' => 'credentials',
                'expiration' => isset($clientData['expiration'])?$clientData['expiration']:null
            ]);
        }
        $request->session()->put('bad',true);


        if (empty(ClientDetail::where('user_id', $client->id)->first())) {
            User::where('id', $client->id)->update($clientData);
            ClientDetail::create($clientData);
        } else {
            UploadClientDetail::insert(array_merge($user, $clientData));
        }
        $clientId = $client->id;
        return redirect(route('affiliate.client.credentials', compact('clientId')))->with('success', "Please check your data");

    }

    /**
     * @return \Illuminate\View\View "affiliate.client-create-credentials" with @clients and @step
     * affiliate adds client credentials for credit bureaus (experian, trans union, equifax etc )
     */
    public function addCredentials(Request $request)
    {
        $user = $request->clientId;
        $affiliateId = Auth::user()->id;
        $a = Affiliate::where('affiliate_id', $affiliateId)
            ->where('user_id', $user)->first();
        if(empty($a)){
            return back();
        }
        $clients = User::where('id', $user)->first();
        $step = $clients->clientDetails->registration_steps;
        return view('affiliate.client-create-credentials', compact('clients', 'step'));

    }

    /**
     * add client credentials
     * @param Request $request
     * request structure []
     * @return redirect on success affiliate.clientReview, on failed affiliate.client.credentials
     */
    public function storeCredentials(Request $request)
    {
        $user = $request->clientId;
        $affiliateId = Auth::user()->id;
        $a = Affiliate::where('affiliate_id', $affiliateId)
            ->where('user_id', $user)->first();
        if(empty($a)){
            return back();
        }

        $data = $request['client'];
        $data['user_id'] = $user;

        if (empty(Credential::where('user_id', $user)->first())) {
            Credential::create($data);
        } else {
            Credential::where('user_id', $user)->update($data);
        }
        $clientDetails = ClientDetail::where('user_id', $user)->first();
        if (!empty($clientDetails) && $clientDetails->registration_steps == 'credentials') {
            $clientDetails->update(["registration_steps" => "review"]);
        }
        $clientId = $user;

        return redirect(route('affiliate.clientReview', compact('clientId')))->with('success', "Please check your data");

   }

    /**
     * @return \Illuminate\View\View "affiliate.client-review" with @clients, @step and @uploadUserDetail
     * affiliate review client details uploaded form document and  rules and if there are inconsistencies
     */
    public function clientReview(Request $request)
    {
        $user = $request->clientId;
        $affiliateId = Auth::user()->id;
        $a = Affiliate::where('affiliate_id', $affiliateId)
            ->where('user_id', $user)->first();
        if(empty($a)){
            return back();
        }
        $client = User::where('id', $user)->first();
        $step = $client->clientDetails->registration_steps;
        $uploadUserDetail = UploadClientDetail::where('user_id', $user)->first();
        return view('affiliate.client-review', compact('client', 'step','uploadUserDetail'));
    }

    /**
     * add client credentials
     * @param Request $request
     * request structure [client[full_name:required, sex:required, address:required]]
     * @return redirect on success affiliate.client.profile, on failed affiliate.clientReview
     */
    public function storeReview(Request $request, $id)
    {

        $user = $request->clientId;
        $affiliateId = Auth::user()->id;
        $a = Affiliate::where('affiliate_id', $affiliateId)
            ->where('user_id', $user)->first();
        if(empty($a)){
            return back();
        }
        $data = $request->client;
        $data["sex"] = isset($data["sex"]) ? $data["sex"] : $data["sex_uploaded"];
        $full_name = explode(" ", $data["full_name"]);
        $data["first_name"] = array_shift($full_name);
        $data["last_name"] = implode(" ", $full_name);
        $uploaded = UploadClientDetail::where("user_id", $id);
        $validation = Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
//            'dob' => ['required'],
            'sex' => ['required'],
//            'ssn' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
        ]);

        if ($validation->fails()) {
            if (!empty($uploaded)) {
                return redirect()->back()
                    ->withInput()
                    ->withErrors($validation);
            }
            return back()->withErrors( $validation );

        } else {

            $user = Arr::only($data, ['first_name', 'last_name']);
            $clientDetails = Arr::except($data, ['full_name', 'first_name', 'last_name', 'sex_uploaded']);

            $fullAddress = explode(',', str_replace([", USA", ",USA"], '', strtoupper($data['address'])));
//            if (isset($fullAddress[2])) {
//                preg_match('/[A-Z]{2}/m', $fullAddress[2], $match);
//                $state = isset($match[0]) ? $match[0] : null;
//                $zip = str_replace([$state, ' '], '', $fullAddress[2]);
//            }

            $splitAddress = $this->splitAddress(str_replace([", USA", ",USA"], '', strtoupper($data['address'])));
            $client_details = ClientDetail::where('user_id', $id)->first();
            $registration_steps = $client_details->registration_steps;

            preg_match("/([0-9]{1,})/im", $splitAddress['street'], $number);
            $clientDetails ["number"] = isset($number[0])?$number[0]:null;
            $clientDetails['name'] = trim(str_replace($clientDetails ["number"], '', $splitAddress['street']));
            $clientDetails['city'] = $splitAddress['city'];
            $clientDetails['state'] = $splitAddress['state'];
            $clientDetails['zip'] =$splitAddress['zip'];
            $clientDetails['address'] = strtoupper($data['address']);
            $clientDetails['registration_steps'] = "finished";

            $client = User::find($id);
            $client->update([
                'first_name' => strtoupper($user['first_name']),
                'last_name' => strtoupper($user['last_name'])
            ]);
            $client_details->update($clientDetails);
            $uploaded->delete();
//            FetchReports::dispatch($client);
//            if ($registration_steps == 'review') {
//                return redirect(route('client.details.create'));
//            }

            return redirect(route('affiliate.client.profile', $id))->with('success', "your data saved");

        }

    }

    /**
     * @return \Illuminate\View\View "affiliate.affiliate.client-profile" with @client, @toDos, @status,
     * @reportsDateEX, @reportsDateEQ, @reportsDateTU, @requiredInfo, @statusDispute
     * affiliate view client profile
     */
    public function clientProfile(Request $request, $id)
    {
//
        $affiliateId = Auth::user()->id;
        $a = Affiliate::where('affiliate_id', $affiliateId)
            ->where('user_id', $id)->first();
        if(empty($a)){
            return back();
        }

        $clients = User::where('id', $id)->first();
        $step = $clients->clientDetails['registration_steps'];

        if($step == null){
            return redirect(route('affiliate.create.client'));

        } elseif($step =='documents'){
            return redirect(route('affiliate.client.document', ['client'=>$id]));

        }elseif($step =='credentials'){
            $clientId = $id;
            return redirect(route('affiliate.client.credentials', compact('clientId')));
        }elseif($step =='review'){
            $clientId = $id;
            return redirect(route('affiliate.clientReview', compact('clientId')));
        }

        $client = User::whereId($id)->first();
        $toDos = Todo::where('client_id', $client->id)->get();

        $status = [null => ''] + \App\Todo::STATUS;
        $reportsDateEQ = ClientReport::where('user_id', $client->id)
            ->where('type', "EQ")->pluck('created_at', 'id')->toArray();
        $reportsDateEX = ClientReport::where('user_id', $client->id)
            ->where('type', "EX_LOG")->pluck('created_at', 'id')->toArray();
        $reportsDateTU = ClientReport::where('user_id', $client->id)
            ->where('type', "TU_DIS")->pluck('created_at', 'id')->toArray();

        $requiredInfoArr = Todo::
        leftJoin('disputables', 'todos.id','=','disputables.todo_id')
            ->where('client_id', $client->id)
            ->whereJsonContains('additional_information', ['security_word' => null])
            ->pluck('disputables.id')
            ->toArray();

        if(!empty($requiredInfoArr)){
            $requiredInfo = Disputable::whereIn('id',$requiredInfoArr )->get();
        }else{
            $requiredInfo = [];

        }
        $statusArray = DB::table('todos')
            ->join('disputables', 'disputables.todo_id', '=', 'todos.id')
            ->where('todos.client_id', $client->id)
            ->groupBy('disputables.status')
            ->select(DB::raw('COUNT(disputables.id) as count'), 'disputables.status as status')
            ->pluck('count', 'status')
            ->toArray();


        $statusInactive = Todo::
        leftJoin('disputables', 'todos.id','=','disputables.todo_id')
            ->where('client_id', $client->id)
            ->where('disputables.status', 0)
            ->whereJsonContains('additional_information', ['security_word' => null])
            ->count('disputables.status');


        $active = !empty($statusArray)? $statusArray[0]- $statusInactive:0;
        $pending = !empty($statusArray) && isset($statusArray[1])? $statusArray[1]:0;
        $complete = !empty($statusArray) && isset($statusArray[2])? $statusArray[2]:0;
        $added = !empty($statusArray) && isset($statusArray[0]) && !is_null($statusInactive)? $statusInactive:0;
        $non_data = empty($statusArray) ? 1:0;

        $statusDispute = json_encode([
            'active' => $active,
            'pending' => $pending,
            'complete'=> $complete,
            'added' => $added,
            'non_data' => $non_data,

        ]);

        return view('affiliate.client-profile', compact('client', 'toDos', 'status', 'reportsDateEX','reportsDateEQ','reportsDateTU','requiredInfo', 'statusDispute'));
    }

    /**
     * skip client registration steps and redirect client profile
     * @return \Illuminate\View\View "affiliate.affiliate.client-profile" with @id
     */
    public function continue($id)
    {
        $affiliateId = Auth::user()->id;
        $a = Affiliate::where('affiliate_id', $affiliateId)
            ->where('user_id', $id)->first();
        if(empty($a)){
            return back();
        }

        $client = User::whereId($id)->first();
        ClientDetail::where('user_id', $client->id)->update(['registration_steps' => 'review']);

        $uploadUserDetail = UploadClientDetail::where('user_id', $client->id)->first();
        return redirect(route('affiliate.client.profile', $client->id));
    }

    public function updateClient(Request $request, $id)
    {
        if(empty($request->file()) && is_null($request->client)){
            return redirect()->back()
                ->withInput()
                ->with('error', 'Please upload both files');
        }

        if($request->file() == true){
            if (empty($request['driver']) && empty($request['social'])) {

                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Please upload both files');
            }
            if(!empty($request['driver'])){
                $imagesDriverLicense = $request->file("driver");

                $imageExtension = ['pdf', 'gif', 'png', 'jpg', 'jpeg', 'tif', 'bmp'];
                $driverLicenseExtension = strtolower($imagesDriverLicense->getClientOriginalExtension());

                if (!in_array($driverLicenseExtension, $imageExtension)) {
                    return redirect()->back()->with('error', 'Please upload the correct file format (PDF, PNG, JPG)');
                }

                $path = "files/client/details/image/" . $id . "/";

                $nameDriverLicense = 'driver_license.' . $driverLicenseExtension;

                $pathDriverLicense = '/' . $path . $nameDriverLicense;

                $clientAttachmentDataDL = [

                    'user_id' => $id,
                    'path' => $pathDriverLicense,
                    'file_name' => $nameDriverLicense,
                    'category' => 'DL',
                    'type' => $driverLicenseExtension

                ];
                $clientAttachment = ClientAttachment::where('user_id', $id)->where('category', 'DL');

                if(empty($clientAttachment->first())){
                    ClientAttachment::insert($clientAttachmentDataDL);
                }else{
                    if(file_exists($clientAttachment->first()->path)){
                        unlink($clientAttachment->first()->path);
                    }
                    $clientAttachment->update($clientAttachmentDataDL);

                }
                $imagesDriverLicense->move(public_path() . '/' . $path, $nameDriverLicense);
            }
            if(!empty($request['social'])){
                $imagesDriverLicense = $request->file("social");

                $imageExtension = ['pdf', 'gif', 'png', 'jpg', 'jpeg', 'tif', 'bmp'];
                $socialSecurityExtension = strtolower($imagesDriverLicense->getClientOriginalExtension());

                if (!in_array($socialSecurityExtension, $imageExtension)) {
                    return redirect()->back()->with('error', 'Please upload the correct file format (PDF, PNG, JPG)');
                }

                $path = "files/client/details/image/" . $id . "/";

                $nameSocialSecurity = 'social_security.' . $socialSecurityExtension;

                $pathSocialSecurity = '/' . $path . $nameSocialSecurity;

                $clientAttachmentDataSS = [

                    'user_id' => $id,
                    'path' => $pathSocialSecurity,
                    'file_name' => $nameSocialSecurity,
                    'category' => 'SS',
                    'type' => $socialSecurityExtension

                ];
                $clientAttachmentSS = ClientAttachment::where('user_id', $id)->where('category', 'SS');
                if(empty($clientAttachmentSS->first())){
                    ClientAttachment::insert($clientAttachmentDataSS);
                }else{
                    if(file_exists($clientAttachment->first()->path)){
                        unlink($clientAttachment->first()->path);
                    }
                    $clientAttachment->update($clientAttachmentDataSS);

                }
                $imagesDriverLicense->move(public_path() . '/' . $path, $nameDriverLicense);
            }

            return redirect()->route('affiliate.client.profile', ['client'=>$id]);

        }else{
            $data = $request->client;
            $data["sex"] = isset($data["sex"]) ? $data["sex"] : $data["sex_uploaded"];
            $full_name = explode(" ", $data["full_name"]);
            $data["first_name"] = array_shift($full_name);
            $data["last_name"] = implode(" ", $full_name);

            $validation = Validator::make($data, [
                'first_name' => ['required', 'string', 'max:255'],
                'last_name' => ['required', 'string', 'max:255'],
                'sex' => ['required'],
                'address' => ['required', 'string', 'max:255'],
            ]);

            if ($validation->fails()) {
                return view('todo.profile.create')->withErrors($validation);
            } else {

                $user = Arr::only($data, ['first_name', 'last_name']);
                $clientDetails = Arr::except($data, ['full_name', 'first_name', 'last_name', 'sex_uploaded']);

                $splitAddress = $this->splitAddress(str_replace([", USA", ",USA"], '', strtoupper($data['address'])));
                $client_details = ClientDetail::where('user_id', $id)->first();

                preg_match("/([0-9]{1,})/im", $splitAddress['street'], $number);
                $clientDetails ["number"] = $number[0];
                $clientDetails['name'] = trim(str_replace($number[0], '', $splitAddress['street']));
                $clientDetails['city'] = $splitAddress['city'];
                $clientDetails['state'] = $splitAddress['state'];
                $clientDetails['zip'] =$splitAddress['zip'];
                $clientDetails['address'] = strtoupper($data['address']);
                $clientDetails['registration_steps'] = "finished";

                $client = User::find($id);
                $client->update([
                    'first_name' => strtoupper($user['first_name']),
                    'last_name' => strtoupper($user['last_name'])
                ]);
                $client_details->update($clientDetails);

                return redirect(route('affiliate.client.profile', ['client'=>$id]))->with('success', "your data saved");
            }
        }

    }

    /**
     * view client credentials
     * @return \Illuminate\View\View "affiliate.client-credentials" with @client and @source
     */
    public function credentials(Request $request, $id)
    {
        $client = User::find($id);
        $source = $request->source;
        return view('affiliate.client-credentials', compact('client', 'source'));
    }

    public function clientReport(Request $request)
    {
        $clientReportsEQ = null;
        $clientReportsTU = null;
        $clientReportsEX = null;

        if($request->date !=null){
            $clientReports = ClientReport::where('id',$request->date);

        }else{
            $clientReports = ClientReport::where('user_id', auth()->user()->id);
        }

        if($request->type == 'equifax'){
            $clientReportsEQ = $clientReports->where('type', "EQ")->first();
            $equifaxDate =$clientReports->where('type', "EQ")
                ->pluck('created_at', 'id')->toArray();
        }elseif($request->type == 'transunion'){
            $clientReportsTU = $clientReports->where('type', "TU_DIS")->first();
            $transunionDate = $clientReports->where('type', "TU")
                ->pluck('created_at', 'id')->toArray();

        }elseif($request->type == 'experian'){
            $clientReportsEX = $clientReports->where('type', "EX_LOG")->first();
//            PDF Cuyc Tal
//            header("Content-type: application/pdf");
//            header("Content-Disposition: inline; filename=filename.pdf");
//            @readfile($clientReportsEX->file_path);// readfile(pdf_path)
//            die;
            $experianDate = auth()->user()->reports()->where('type', "EX_LOG")
                ->pluck('created_at', 'id')->toArray();
        }

        return view('affiliate.client-report', compact('clientReportsEX','clientReportsTU', 'clientReportsEQ',
            'equifaxDate','experianDate','transunionDate'));
    }


    public function negativeItem($id)
    {
        $affiliateId = Auth::user()->id;
        $a = Affiliate::where('affiliate_id', $affiliateId)
            ->where('user_id', $id)->first();
        if(empty($a)){
            return back();
        }

        $client =User::whereId($id)->first();

        $clientReportsTU = ClientReport::where('user_id', $client->id)->where('type', "TU_DIS")->orderBy('id', 'DESC')->first();
        $clientReportsEX = ClientReport::where('user_id', $client->id)->where('type', "EX_LOG")->orderBy('id', 'DESC')->first();
        $clientReportsEQ = ClientReport::where('user_id', $client->id)->where('type', "EQ")->orderBy('id', 'DESC')->first();

        return view('affiliate.client-view_negative_item', compact('clientReportsEX', 'clientReportsTU', 'clientReportsEQ', 'client'));
    }

    public function negativeItemStore(Request $request, $id)
    {

        $affiliateId = Auth::user()->id;
        $a = Affiliate::where('affiliate_id', $affiliateId)
            ->where('user_id', $id)->first();
        if (empty($a)) {
            return back();
        }

        $pricingDetails = new PricingDetails($affiliateId);

        $dispute = $request->except('_token');

        if(empty($dispute)){
            return back();
        };
        $userId = User::whereId($id)->first()->id;

        $disputeExName = [];
        $disputeTuName = [];
        $disputeEqName = [];
        $disputeExEmployer = [];
        $disputeTuEmployer = [];
        $disputeEqEmployer = [];
        $disputeExAddress = [];
        $disputeTuAddress = [];
        $disputeEqAddress = [];
        $disputeExPhone = [];
        $disputeTuPhone = [];
        $disputeExPublicRecord = [];
        $disputeExAccount = [];
        $disputeExInquiry = [];
        $disputeExStatement = [];
        $disputeTuPublicRecord = [];
        $disputeTuAccount = [];
        $disputeTuInquiry = [];
        $disputeTuStatement = [];
        $disputeEqPublicRecord = [];
        $disputeEqAccount = [];
        $disputeEqInquiry = [];

        foreach ($dispute as $key => $value) {

            if ($key == 'ex_name') {
                foreach ($value as $dispute_name) {
                    $name = ClientReportName::where('id', $dispute_name)->first();
                    $disputeExName[] = $name;
                }
            }
            if ($key == 'tu_name') {
                foreach ($value as $dispute_name) {
                    $name = ClientReportName::where('id', $dispute_name)->first();
                    $disputeTuName[] = $name;
                }
            }
            if ($key == 'eq_name') {
                foreach ($value as $dispute_name) {
                    $name = ClientReportName::where('id', $dispute_name)->first();
                    $disputeEqName[] = $name;
                }
            }

            if ($key == 'ex_employ') {
                foreach ($value as $dispute_name) {
                    $name = ClientReportEmployer::where('id', $dispute_name)->first();
                    $disputeExEmployer[] = $name;
                }
            }
            if ($key == 'tu_employ') {
                foreach ($value as $dispute_name) {
                    $name = ClientReportEmployer::where('id', $dispute_name)->first();
                    $disputeTuEmployer[] = $name;
                }
            }
            if ($key == 'eq_employ') {
                foreach ($value as $dispute_name) {
                    $name = ClientReportEmployer::where('id', $dispute_name)->first();
                    $disputeEqEmployer[] = $name;
                }
            }

            if ($key == 'ex_address') {
                foreach ($value as $disputeAddresses) {
                    $address = ClientReportAddress::where('id', $disputeAddresses)->first();
                    $disputeExAddress[] = $address;
                }
            }
            if ($key == 'tu_address' ) {
                foreach ($value as $disputeAddresses) {
                    $address = ClientReportAddress::where('id', $disputeAddresses)->first();
                    $disputeTuAddress[] = $address;
                }
            }
            if ( $key == 'eq_address') {
                foreach ($value as $disputeAddresses) {
                    $address = ClientReportAddress::where('id', $disputeAddresses)->first();
                    $disputeEqAddress[] = $address;
                }
            }

            if ($key == 'ex_phone') {
                foreach ($value as $disputePhones) {
                    $phone = ClientReportPhone::where('id', $disputePhones)->first();
                    $disputeExPhone[] = $phone;
                }
            }
            if ( $key == 'tu_phone') {
                foreach ($value as $disputePhones) {
                    $phone = ClientReportPhone::where('id', $disputePhones)->first();
                    $disputeTuPhone[] = $phone;
                }
            }

            if(!isset($personalExPrice)){
                if($key == 'ex_name' or 'ex_address' or $key == 'ex_employ' or $key == 'ex_phone' ){
                    $personalExPrice = $pricingDetails->personalInformation();
                }
            }
            if(!isset($personalTuPrice)){
                if($key == 'tu_name' or $key == 'tu_address' or $key == 'tu_employ' or $key == 'tu_phone' ){
                    $personalTuPrice = $pricingDetails->personalInformation();

                }
            }
            if(!isset($personalEqPrice)){
                if($key == 'eq_name' or $key == 'eq_address' or $key == 'eq_employ' ){
                    $personalEqPrice = $pricingDetails->personalInformation();
                }
            }

            if ($key == 'ex_statement') {
                foreach ($value as $disputeExStatements) {
                    $exStatement = ClientReportExStatement::where('id', $disputeExStatements)->first();//???
                    $statementPricing = $pricingDetails->statement();
                    $dataExStatement =  [
                        'ex_statement'=> $exStatement,
                        'price'=>$statementPricing
                    ];
                    $disputeExStatement[] = $dataExStatement;
                }
            }
            if ($key == 'tu_statement') {
                foreach ($value as $disputeTuStatements) {
                    $tuStatement = ClientReportTuStatement::where('id', $disputeTuStatements)->first();

                    $statementPricing = $pricingDetails->statement();
                    $dataTuStatement =  [
                        'tu_statement'=> $tuStatement,
                        'price'=>$statementPricing
                    ];
                    $disputeTuStatement[] = $dataTuStatement;
                }
            }

            if ($key == 'ex_public') {
                foreach ($value as $disputeExPublicRecords) {
                    $exPublic = ClientReportExPublicRecord::where('id', $disputeExPublicRecords)->first();
                    $exPublicRecordPrice =$pricingDetails->publicRecordPrice();
                    $dataExPublic =  [
                        'ex_public'=> $exPublic,
                        'price'=>$exPublicRecordPrice
                    ];
                    $disputeExPublicRecord[] = $dataExPublic;
                }
            }
            if ($key == 'tu_public') {
                foreach ($value as $disputeTuPublicRecords) {
                    $tuPublic = ClientReportTuPublicRecord::where('id', $disputeTuPublicRecords)->first();
                    $tuPublicRecordPrice =$pricingDetails->publicRecordPrice();
                    $dataTuPublic =  [
                        'tu_public'=> $tuPublic,
                        'price'=>$tuPublicRecordPrice
                    ];
                    $disputeTuPublicRecord[] = $dataTuPublic;
                }
            }
            if ($key == 'eq_public') {
                foreach ($value as $disputeEqPublicRecords) {

                    $eqPublic = ClientReportEqPublicRecord::where('id', $disputeEqPublicRecords)->first();
                    $tuPublicRecordPrice =$pricingDetails->publicRecordPrice();
                    $dataEqPublic =  [
                        'eq_public'=> $eqPublic,
                        'price'=>$tuPublicRecordPrice
                    ];
                    $disputeEqPublicRecord[] = $dataEqPublic;
                }
            }

            if ($key == 'ex_accounts') {
                foreach ($value as $disputeExAccounts) {
                    $exAccount = ClientReportExAccount::where('id', $disputeExAccounts)->first();
                    $exAccountPricing = $pricingDetails->exAccountPrice($key, $disputeExAccounts);
                    $dataExAccount =  [
                        'ex_account'=> $exAccount,
                        'price'=>$exAccountPricing
                    ];
                    $disputeExAccount[] = $dataExAccount;
                }
            }
            if ($key == 'tu_account') {
                foreach ($value as $disputeTuAccounts) {
                    $tuAccount = ClientReportTuAccount::where('id', $disputeTuAccounts)->first();
                    $tuAccountPricing = $pricingDetails->tuAccountPrice($key, $disputeTuAccounts);
                    $dataTuAccount =  [
                        'tu_account'=> $tuAccount,
                        'price'=>$tuAccountPricing
                    ];
                    $disputeTuAccount[] = $dataTuAccount;
                }
            }
            if ($key == 'eq_account') {
                foreach ($value as $disputeEqAccounts) {
                    $eqAccount = ClientReportEqAccount:: where('id', $disputeEqAccounts)->first();
                    $eqAccountPricing = $pricingDetails->eqAccountPrice($key, $disputeEqAccounts);
                    $dataEqAccount =  [
                        'eq_account'=> $eqAccount,
                        'price'=>$eqAccountPricing
                    ];
                    $disputeTuAccount[] = $dataEqAccount;
                }
            }

            if ($key == 'ex_inquiry') {
                foreach ($value as $disputeExInquiries) {
                    $exInquiry = ClientReportExInquiry::where('id', $disputeExInquiries)->first();

                    $inquiryExPricing = $pricingDetails->inquiries();
                    $dataExInquiry =  [
                        'ex_inquiry'=> $exInquiry,
                        'price'=>$inquiryExPricing
                    ];
                    $disputeExInquiry[] = $dataExInquiry;
                }
            }
            if ($key == 'tu_inquiry') {
                foreach ($value as $disputeTuInquiries) {
                    $tuInquiry = ClientReportTuInquiry::where('id', $disputeTuInquiries)->first();
                    $inquiryTuPricing = $pricingDetails->inquiries();
                    $dataTuInquiry =  [
                        'tu_inquiry'=> $tuInquiry,
                        'price'=>$inquiryTuPricing
                    ];
                    $disputeTuInquiry[] = $dataTuInquiry;
                }
            }
            if ($key == 'eq_inquiry') {
                foreach ($value as $disputeEqInquiries) {

                    $eqInquiry = ClientReportTuInquiry::where('id', $disputeEqInquiries)->first();

                    $inquiryEqPricing = $pricingDetails->inquiries();
                    $dataEqInquiry =  [
                        'eq_inquiry'=> $eqInquiry,
                        'price'=>$inquiryEqPricing
                    ];
                    $disputeEqInquiry[] = $dataEqInquiry;
                }
            }

        }

        $dataPersonalPrice = [
            'ex_personal' =>isset($personalExPrice)?$personalExPrice:null,
            'tu_personal' =>isset($personalTuPrice)?$personalTuPrice:null,
            'eq_personal' =>isset($personalEqPrice)?$personalEqPrice:null,
        ];


        $data = [
            'ex_name' => $disputeExName,
            'tu_name' => $disputeTuName,
            'eq_name' => $disputeEqName,
            'ex_employ' => $disputeExEmployer,
            'tu_employ' => $disputeTuEmployer,
            'eq_employ' => $disputeEqEmployer,
            'ex_address' => $disputeExAddress,
            'tu_address' => $disputeTuAddress,
            'eq_address' => $disputeEqAddress,
            'ex_phone' => $disputeExPhone,
            'tu_phone' => $disputeTuPhone,
            'personal_price' =>$dataPersonalPrice,
            'ex_public' => $disputeExPublicRecord,
            'ex_account' => $disputeExAccount,
            'ex_inquiry' => $disputeExInquiry,
            'ex_statement' => $disputeExStatement,
            'tu_public' => $disputeTuPublicRecord,
            'tu_account' => $disputeTuAccount,
            'tu_inquiry' => $disputeTuInquiry,
            'tu_statement' => $disputeTuStatement,
            'eq_public' => $disputeEqPublicRecord,
            'eq_account' => $disputeEqAccount,
            'eq_inquiry' => $disputeEqInquiry
        ];

        return view('affiliate.client-view_negative_show', compact('data', 'userId'));
    }

    public function negativeItemContract(Request $request, $id)
    {

        $affiliateId = Auth::user()->id;
        $a = Affiliate::where('affiliate_id', $affiliateId)
            ->where('user_id', $id)->first();
        if(empty($a)){
            return back();
        }
        $dispute = $request->except('_token');
        $clientId = User::whereId($id)->first()->id;

        $user = User::where('role', 'receptionist')->first();

        foreach ($dispute as $key => $value) {
            set_time_limit(300);

            if ($key == 'name') {
                $todoName = $this->saveToDo($clientId, $user->id, "Name", "",0);
                foreach ($value as $dispute_name) {
                    $this->saveDisputable($todoName, "App\\ClientReportName",  $dispute_name, 0);
                }
                $checkToDo = Disputable::where('todo_id', $todoName)->count('id');
                if( is_null($checkToDo)){
                    Todo::where('id', $todoName)->delete();
                }
            }

            if ($key == 'employer') {
                $todoEmployer = $this->saveToDo($clientId, $user->id, "Employer", "",0);
                foreach ($value as $dispute_name) {
                    $this->saveDisputable($todoEmployer, "App\\ClientReportEmployer",  $dispute_name, 0);
                }
                $checkToDo = Disputable::where('todo_id', $todoEmployer)->count('id');
                if( is_null($checkToDo)){
                    Todo::where('id', $todoEmployer)->delete();
                }
            }

            if ($key == 'address') {
                $todoAddress = $this->saveToDo($clientId, $user->id, "Address", "",0);
                foreach ($value as $disputeAddresses) {
                    $this->saveDisputable($todoAddress, "App\\ClientReportAddress",  $disputeAddresses);
                }
                $checkToDo = Disputable::where('todo_id', $todoAddress)->count('id');
                if( is_null($checkToDo)){
                    Todo::where('id', $todoAddress)->delete();
                }
            }

            if ($key == 'phone') {
                $todoPhone = $this->saveToDo($clientId, $user->id, "Phone", "",0);
                foreach ($value as $disputePhones) {
                    $this->saveDisputable($todoPhone, "App\\ClientReportPhone",  $disputePhones,0);
                }
                $checkToDo = Disputable::where('todo_id', $todoPhone)->count('id');
                if( is_null($checkToDo)){
                    Todo::where('id', $todoPhone)->delete();
                }
            }

            if ($key == 'ex_public') {
                $todoExPublic = $this->saveToDo($clientId, $user->id, "Experian Public Record", "",0);
                foreach ($value as $disputeExPublicRecords) {
                    $this->saveDisputable($todoExPublic, "App\\ClientReportExPublicRecord",  $disputeExPublicRecords,0);
                }
                $checkToDo = Disputable::where('todo_id', $todoExPublic)->count('id');
                if( is_null($checkToDo)){
                    Todo::where('id', $todoExPublic)->delete();
                }
            }

            if ($key == 'ex_account') {
//                $todoExAccount = $this->saveToDo($clientId, $user->id, "Experian Account", "",0);
                foreach ($value as $disputeExAccounts) {
                    $disputeReason = $this->experianAccountDsiputeReasone($disputeExAccounts['id']);
                    $todo = Todo::create([
                        "client_id" => $clientId,
                        "user_id" => $user->id,
                        "title" => $disputeReason["name"]
                    ]);
                    $disputable = $todo->disputes()->createMany([
                        [
                            "disputable_id" => $disputeExAccounts['id'],
                            "disputable_type" => "App\\ClientReportExAccount",
                            "additional_information" => [
                                "attention" => $disputeReason['attention']
                            ]
                        ]
                    ]);
                }
            }

            if ($key == 'ex_inquiry') {
                $todoExInquiry = $this->saveToDo($clientId, $user->id, "Experian Inquiry", "",0);
                foreach ($value as $disputeExInquiries) {
                    $this->saveDisputable($todoExInquiry, "App\\ClientReportExInquiry",  $disputeExInquiries,0);
                }
                $checkToDo = Disputable::where('todo_id', $todoExInquiry)->count('id');
                if( is_null($checkToDo)){
                    Todo::where('id', $todoExInquiry)->delete();
                }
            }

            if ($key == 'ex_statement') {
                $todoExStatement = $this->saveToDo($clientId, $user->id, "Experian Statement", "",0);
                foreach ($value as $disputeExStatements) {
                    $this->saveDisputable($todoExStatement, "App\\ClientReportExStatement",  $disputeExStatements,0);
                }
                $checkToDo = Disputable::where('todo_id', $todoExStatement)->count('id');
                if( is_null($checkToDo)){
                    Todo::where('id', $todoExStatement)->delete();
                }
            }

            if ($key == 'tu_public') {
                $todoTuPublic = $this->saveToDo($clientId, $user->id, "TransUnion Public Record", "",0);
                foreach ($value as $disputeTuPublicRecords) {
                    $this->saveDisputable($todoTuPublic, "App\\ClientReportTuPublicRecord",  $disputeTuPublicRecords,0);
                }
                $checkToDo = Disputable::where('todo_id', $todoTuPublic)->count('id');
                if( is_null($checkToDo)){
                    Todo::where('id', $todoTuPublic)->delete();
                }

            }

            if ($key == 'tu_account') {
                $todoTuAccount = $this->saveToDo($clientId, $user->id, "TransUnion Account", "",0);
                foreach ($value as $disputeTuAccounts) {
                    $this->saveDisputableAdditional($todoTuAccount, "App\\ClientReportTuAccount",  $disputeTuAccounts,0);
                }
                $checkToDo = Disputable::where('todo_id', $todoTuAccount)->count('id');
                if( is_null($checkToDo)){
                    Todo::where('id', $todoTuAccount)->delete();
                }
            }

            if ($key == 'tu_inquiry') {
                $todoTuInquiry = $this->saveToDo($clientId, $user->id, "TransUnion Inquiry", "",0);
                foreach ($value as $disputeTuInquiries) {
                    $this->saveDisputable($todoTuInquiry, "App\\ClientReportTuInquiry",  $disputeTuInquiries,0);
                }
                $checkToDo = Disputable::where('todo_id', $todoTuInquiry)->count('id');
                if( is_null($checkToDo)){
                    Todo::where('id', $todoTuInquiry)->delete();
                }
            }

            if ($key == 'tu_statement') {
                $todoTuStatement = $this->saveToDo($clientId, $user->id, "TransUnion Statement", "",0);
                foreach ($value as $disputeTuStatements) {
                    $this->saveDisputable($todoTuStatement, "App\\ClientReportTuStatement",  $disputeTuStatements,0);
                }
                $checkToDo = Disputable::where('todo_id', $todoTuStatement)->count('id');
                if( is_null($checkToDo)){
                    Todo::where('id', $todoTuStatement)->delete();
                }
            }

            if ($key == 'eq_public') {
                $todoEqPublic = $this->saveToDo($clientId, $user->id, "Equifax Public Record", "",0);
                foreach ($value as $disputeEqPublicRecords) {
                    $this->saveDisputable($todoEqPublic, "App\\ClientReportEqPublicRecord",  $disputeEqPublicRecords,0);
                }
                $checkToDo = Disputable::where('todo_id', $todoEqPublic)->count('id');
                if( is_null($checkToDo)){
                    Todo::where('id', $todoEqPublic)->delete();
                }
            }

            if ($key == 'eq_account') {
                $todoEqAccount = $this->saveToDo($clientId, $user->id, "Equifax Account", "",0);
                foreach ($value as $disputeEqAccounts) {
                    $this->saveDisputableAdditional($todoEqAccount, "App\\ClientReportEqAccount",  $disputeEqAccounts,0);
                }
                $checkToDo = Disputable::where('todo_id', $todoEqAccount)->count('id');
                if( is_null($checkToDo)){
                    Todo::where('id', $todoEqAccount)->delete();
                }
            }

            if ($key == 'eq_inquiry') {
                $todoEqInquiry = $this->saveToDo($clientId, $user->id, "Equifax Inquiry", "",0);
                foreach ($value as $disputeEqInquiries) {
                    $this->saveDisputable($todoEqInquiry, "App\\ClientReportEqInquiry",  $disputeEqInquiries,0);
                }
                $checkToDo = Disputable::where('todo_id', $todoEqInquiry)->count('id');
                if( is_null($checkToDo)){
                    Todo::where('id', $todoEqInquiry)->delete();
                }
            }
            return redirect()->route('affiliate.client.profile', $clientId);

        }

    }

    public function showRequireInfo( $info)
    {
        $completeDispute = Disputable::where('id', $info)->get();
        return view('client_details.complete-dispute', compact('completeDispute'));
    }

    public function updateDispute(Request $request)
    {
        $dispute = $request->eq_account;

        $id = $dispute['id'];
        unset($dispute['id']);

        Disputable::where('id', $id)->update([
            'additional_information'=>$dispute
        ]);
        return redirect()->route('client.details.index');

    }

    public function saveToDo($clientId, $userId, $title, $desc, $status)
    {
        $todo = Todo::create([
            'client_id' => $clientId,
            'user_id' => $userId,
            'title' => $title,
            'description' => "",
            'status' => $status,
            'due_date' => null,
            'completed_date' => null
        ]);

        return $todo->id;
    }

    public function saveDisputable($todoId, $type, $id, $status)
    {
        $check = Disputable::where('disputable_type', $type)
            ->where('disputable_id', $id)->first();
        if(empty($check)){
            Disputable::create([
                'todo_id' => $todoId,
                'disputable_type' => $type,
                'disputable_id' => $id,
                'status' => $status,
                'additionanal_information'=>null

            ]);
        }

        return true;
    }

    public function saveDisputableAdditional($todoId, $type, $idInformation, $status)
    {
        $disputeId = $idInformation['id'];
        $json  = null;
        if(count($idInformation)>1){
            unset($idInformation['id']);
            $json = $idInformation;
        }

        $check = Disputable::where('disputable_type', $type)
            ->where('disputable_id', $disputeId)->first();
        if(empty($check)) {
            Disputable::create([
                'todo_id' => $todoId,
                'disputable_type' => $type,
                'disputable_id' => $disputeId,
                'status' => $status,
                'additional_information' => $json
            ]);
        }
        return true;
    }

    public function credentialsUpdate(Request $request)
    {
        $userId = $request->id;
        $data = $request['client'];
        $data['user_id'] = $userId;

        if (empty(Credential::where('user_id', $userId)->first())) {
            Credential::create($data);
        } else {
            Credential::where('user_id', $userId)->update($data);
        }
        $clientDetails = ClientDetail::where('user_id', $userId)->first();
        if (!empty($clientDetails) && $clientDetails->registration_steps == 'credentials') {
            $clientDetails->update(["registration_steps" => "review"]);
        }
        return redirect(route('affiliate.client.profile', $userId));
    }


    /*
     * dispute reasoner ashxatoxneri hamar voroshelu
     * funkcianer en vory karox texapoxvi arandzin service mej
     */

    public function experianAccountDsiputeReasone($accountId)
    {
        $exAccount = ClientReportExAccount::whereId($accountId)->first();
        $responsibility = $exAccount->responsibility;


        if($exAccount->account_type() != "CA"){

//            $openClose = strpos(strtolower($exAccount->status), "close") !== false ? "Close" : "Open";
//            $type = $exAccount->type;
            $late_statues = $exAccount->getTodoAttributes();

            dd($late_statues);

            $paymentLate = $this->exPaymentHistories($exAccount);
            return  [
                "name" => strtoupper("{$openClose} {$responsibility} {$type} {$late_statues['status']}"),
                "attention" => $late_statues["need_attention"]
            ];


        }else{

            $type =$this->getCollectionType($exAccount);
            return  [
                "name" => strtoupper(" COLLECTION /{$exAccount->type} {$responsibility} {$type['type']}"),
                "attention" => "see differents if exist"
            ];


        }


    }

    public function getCollectionType($exAccount)
    {

        $reportId = $exAccount->client_report_id;
        $exAccounts =   ClientReportExAccount::where('client_report_id', $reportId)
            ->where("id", "!=", $exAccount->id);

        $exAccountsName = $exAccounts ->pluck('source_name', 'id')->toArray();
        $exAccountsNumber = $exAccounts->pluck('source_id', 'id')->toArray();
        $exAccountsSold = array_filter($exAccounts->pluck('sold_to', 'id')->toArray());
        $originalCreditor = BankLogo::where('name', $exAccount->source_name)->first();
        $equalName  = EqualBank::where('bank_logo_id', $originalCreditor->id)->pluck('name')->toArray();
        array_push($equalName, $originalCreditor->name);

        $findNameKey = array_search($exAccount->source_name, $exAccountsName);
        $findNameId = array_search($exAccount->source_id, $exAccountsNumber);
        $intersectEqual = array_intersect(array_map('strtolower', $exAccountsName), array_map('strtolower', $equalName));

        if($findNameKey !== false || $findNameId !== false){
            $account = ClientReportExAccount::whereId($findNameKey)->first();
            $statusDate = $account->status_date;
            $status = $account->status;
            $reWrittenOff = "/([0-9\,\s]{2,})+written off/m";
            $rePastDue = "/([0-9\,\s]{2,})+past due as/m";
            preg_match($reWrittenOff, $status, $matchWrittenOff);
            preg_match($rePastDue, $status, $matchPastDue);

            $writtenOff = isset($matchWrittenOff[1])?trim($matchWrittenOff[1]):null;
            $pastDue = isset($matchPastDue[1])?trim($matchPastDue[1]):null;
            $balance  = !empty($account->recent_balance_amount)?$account->recent_balance_amount:$account->high_balance;
            $balanceCA  = !empty($exAccounts->recent_balance_amount)?$exAccounts->recent_balance_amount:$exAccounts->high_balance;
            $diff = $writtenOff - $pastDue;
            $diffOriginalPast = $balance - $pastDue;
            $diffOriginalWritten = $balance - $pastDue;
            $diffWrittenOffCollection = $writtenOff - $balanceCA;
            $diffPastCollection = $pastDue - $balanceCA;
            $diffBalanceCollection = $balance - $balanceCA;

            if(!empty($exAccountsSold) && array_search($exAccount->orginal_name, $exAccountsSold) == $findNameKey){
                return  [
                        'type'=> $account->type,
                        'offset' => [
                            $diff,
                            $diffOriginalPast,
                            $diffOriginalWritten,
                            $diffWrittenOffCollection,
                            $diffPastCollection,
                            $diffBalanceCollection,
                        ]
                    ];
            }else{
                $offset  = 0.09 * ($balance);
                if($diff <= $offset &&  $diffOriginalPast <= $offset &&
                    $diffOriginalWritten <= $offset && $diffWrittenOffCollection <= $offset &&
                    $diffPastCollection <= $offset && $diffBalanceCollection <= $offset) {
                    return   [
                        'type'=> $account->type,
                        'offset' => [
                            $diff,
                            $diffOriginalPast,
                            $diffOriginalWritten,
                            $diffWrittenOffCollection,
                            $diffPastCollection,
                            $diffBalanceCollection,
                        ]
                    ];
                }
            }
        }elseif(!empty($intersectEqual) && count($intersectEqual)>1){
            $accountIds = array_keys($intersectEqual);
            foreach($accountIds as $id){
                $account = ClientReportExAccount::whereId($id)->first();
                $statusDate = $account->status_date;
                $status = $account->status;
                $reWrittenOff = "/([0-9\,\s]{2,})written off/m";
                $rePastDue = "/([0-9\,\s]{2,})+past due as/m";

                preg_match($reWrittenOff, $status, $matchWrittenOff);
                preg_match($rePastDue, $status, $matchPastDue);

                $writtenOff = isset($matchWrittenOff[1])?trim($matchWrittenOff[1]):null;
                $pastDue = isset($matchPastDue[1])?trim($matchPastDue[1]):null;

                $diff = $writtenOff - $pastDue;
                $balance  = !empty($account->credit_limit)?$account->credit_limit:$account->high_balance;
                $balanceCA  = !empty($exAccounts->credit_limit)?$exAccounts->credit_limit:$exAccounts->high_balance;
                $diffOriginalPast = $balance - $pastDue;
                $diffOriginalWritten = $balance - $pastDue;
                $diffWrittenOffCollection = $writtenOff - $balanceCA;
                $diffPastCollection = $pastDue - $balanceCA;
                $diffBalanceCollection = $balance - $balanceCA;

                if(!empty($exAccountsSold) && array_search($exAccount->orginal_name, $exAccountsSold) !== false){
                    return     [
                        'type'=> $account->type,
                        'offset' => [
                            $diff,
                            $diffOriginalPast,
                            $diffOriginalWritten,
                            $diffWrittenOffCollection,
                            $diffPastCollection,
                            $diffBalanceCollection,
                        ]
                    ];
                }else{
                    $offset  = 0.09 * ($balance);
                    if($diff <= $offset &&  $diffOriginalPast <= $offset &&
                        $diffOriginalWritten <= $offset && $diffWrittenOffCollection <= $offset &&
                        $diffPastCollection <= $offset && $diffBalanceCollection <= $offset) {
                        return     [
                            'type'=> $account->type,
                            'offset' => [
                                $diff,
                                $diffOriginalPast,
                                $diffOriginalWritten,
                                $diffWrittenOffCollection,
                                $diffPastCollection,
                                $diffBalanceCollection,
                            ]
                        ];
                    }
                }
            }
        }else{
            return [
                'type'=> $originalCreditor->type,
                'offset' => []
            ];
        }
    }

    public function exPaymentHistories($account)
    {
        $countByType = $account->paymentHistories()->groupBy('status')->select(DB::Raw('COUNT(id) as count'), 'status')
            ->pluck('count', 'status')->toArray();
        $status = $account->paymentHistories()->pluck('status', 'id')->toArray();
        $lates = $this->exLates($countByType);

        $keys30 = array_keys($status, "30");
        $keys60 = array_keys($status, "60");
        $keys90 = array_keys($status, "90");
        $keys120 = array_keys($status, "120");
        $keys150 = array_keys($status, "150");
        $keys180 = array_keys($status, "180");

        $count30DaysLate = !empty($keys30)?$this->countDaysLate($keys30):null;
        $count60DaysLate = !empty($keys60)?$this->countDaysLate($keys60):null;
        $count90DaysLate = !empty($keys90)?$this->countDaysLate($keys90):null;
        $count120DaysLate = !empty($keys120)?$this->countDaysLate($keys120):null;
        $count150DaysLate = !empty($keys150)?$this->countDaysLate($keys150):null;
        $count180DaysLate = !empty($keys180)?$this->countDaysLate($keys180):null;
        $consicutiveLateDays = [];


        $j = 0;
        if(!is_null($count30DaysLate)){
            foreach($count30DaysLate as $value){
                $next = $this->get_next($status, $value['last_key']);
                $consicutiveLateDays[$j] = $value['count']. " 30 DAYS LATE";

                if($next['value'] == "60"){
                    $key60 = array_search($next['key'], array_combine( array_keys($count60DaysLate), array_column($count60DaysLate, 'first_key')));
                    $consicutiveLateDays[$j] = $consicutiveLateDays[$j] ." ".$count60DaysLate[$key60]['count']. " 60 DAYS LATE";
                    $next60 = $this->get_next($status, $count60DaysLate[$key60]['last_key']);
                    unset($count60DaysLate[$key60]);
                    if($next60['value'] == "90") {
                        $key90 = array_search($next60['key'], array_combine( array_keys($count90DaysLate), array_column($count90DaysLate, 'first_key')));
                        $consicutiveLateDays[$j] = $consicutiveLateDays[$j] ." ".$count90DaysLate[$key90]['count']. " 90 DAYS LATE";
                        $next120 = $this->get_next($status, $count90DaysLate[$key90]['last_key']);
                        unset($count90DaysLate[$key90]);
                        if($next120['value'] == "120") {
                            $key120 = array_search($next120['key'], array_combine( array_keys($count120DaysLate), array_column($count120DaysLate, 'first_key')));
                            $consicutiveLateDays[$j] = $consicutiveLateDays[$j] ." ".$count120DaysLate[$key120]['count']. " 120 DAYS LATE";
                            $next150 = $this->get_next($status, $count120DaysLate[$key120]['last_key']);
                            unset($count120DaysLate[$key120]);
                            if($next150['value'] == "150") {
                                $key150 = array_search($next150['key'], array_combine( array_keys($count150DaysLate), array_column($count150DaysLate, 'first_key')));
                                $consicutiveLateDays[$j] = $consicutiveLateDays[$j] ." ".$count150DaysLate[$key150]['count']. " 150 DAYS LATE";
                                $next180 = $this->get_next($status, $count150DaysLate[$key150]['last_key']);
                                unset($count150DaysLate[$key150]);
                                if($next180['value'] == "180") {
                                    $key180 = array_search($next180['key'], array_combine( array_keys($count180DaysLate), array_column($count180DaysLate, 'first_key')));
                                    $consicutiveLateDays[$j] = $consicutiveLateDays[$j] ." ".$count180DaysLate[$key180]['count']. " 180 DAYS LATE";
                                    unset($count180DaysLate[$key180]);
                                }
                            }elseif($next150['value'] == "180") {
                                $key180 = array_search($next150['key'], array_combine( array_keys($count180DaysLate), array_column($count180DaysLate, 'first_key')));
                                $consicutiveLateDays[$j] = $consicutiveLateDays[$j] ." ".$count180DaysLate[$key180]['count']. " 180 DAYS LATE";
                                unset($count180DaysLate[$key180]);
                            }
                        }elseif($next120['value'] == "150") {
                            $key150 = array_search($next120['key'], array_combine( array_keys($count150DaysLate), array_column($count150DaysLate, 'first_key')));
                            $consicutiveLateDays[$j] = $consicutiveLateDays[$j] ." ".$count150DaysLate[$key150]['count']. " 150 DAYS LATE";
                            $next180 = $this->get_next($status, $count150DaysLate[$key150]['last_key']);
                            unset($count150DaysLate[$key150]);
                            if($next180['value'] == "180") {
                                $key180 = array_search($next180['key'], array_combine( array_keys($count180DaysLate), array_column($count180DaysLate, 'first_key')));
                                $consicutiveLateDays[$j] = $consicutiveLateDays[$j] ." ".$count180DaysLate[$key180]['count']. " 180 DAYS LATE";
                                unset($count180DaysLate[$key180]);
                            }
                        }elseif($next120['value'] == "180") {
                            $key180 = array_search($next120['key'], array_combine( array_keys($count180DaysLate), array_column($count180DaysLate, 'first_key')));
                            $consicutiveLateDays[$j] = $consicutiveLateDays[$j] ." ".$count180DaysLate[$key180]['count']. " 180 DAYS LATE";
                            unset($count180DaysLate[$key180]);
                        }
                    }elseif($next60['value'] == "120"){
                        $key120 = array_search($next60['key'], array_combine( array_keys($count120DaysLate), array_column($count120DaysLate, 'first_key')));
                        $consicutiveLateDays[$j] = $consicutiveLateDays[$j] ." ".$count120DaysLate[$key120]['count']. " 120 DAYS LATE";
                        $next150 = $this->get_next($status, $count120DaysLate[$key120]['last_key']);
                        unset($count120DaysLate[$key120]);
                        if($next150['value'] == "150") {
                            $key150 = array_search($next150['key'], array_combine( array_keys($count150DaysLate), array_column($count150DaysLate, 'first_key')));
                            $consicutiveLateDays[$j] = $consicutiveLateDays[$j] ." ".$count150DaysLate[$key150]['count']. " 150 DAYS LATE";
                            $next180 = $this->get_next($status, $count150DaysLate[$key150]['last_key']);
                            unset($count150DaysLate[$key150]);
                            if($next180['value'] == "180") {
                                $key180 = array_search($next180['key'], array_column($count180DaysLate, 'first_key'));
                                $consicutiveLateDays[$j] = $consicutiveLateDays[$j] ." ".$count180DaysLate[$key180]['count']. " 180 DAYS LATE";
                                unset($count180DaysLate[$key180]);
                            }
                        }elseif($next150['value'] == "180") {
                            $key180 = array_search($next150['key'], array_combine( array_keys($count180DaysLate), array_column($count180DaysLate, 'first_key')));
                            $consicutiveLateDays[$j] = $consicutiveLateDays[$j] ." ".$count180DaysLate[$key180]['count']. " 180 DAYS LATE";
                            unset($count180DaysLate[$key180]);
                        }
                    }elseif($next60['value'] == "150") {
                        $key150 = array_search($next60['key'], array_combine( array_keys($count150DaysLate), array_column($count150DaysLate, 'first_key')));
                        $consicutiveLateDays[$j] = $consicutiveLateDays[$j] ." ".$count150DaysLate[$key150]['count']. " 150 DAYS LATE";
                        $next180 = $this->get_next($status, $count150DaysLate[$key150]['last_key']);
                        unset($count150DaysLate[$key150]);
                        if($next180['value'] == "180") {
                            $key180 = array_search($next180['key'], array_combine( array_keys($count180DaysLate), array_column($count180DaysLate, 'first_key')));
                            $consicutiveLateDays[$j] = $consicutiveLateDays[$j] . " " . $count180DaysLate[$key180]['count'] . " 180 DAYS LATE";
                            unset($count180DaysLate[$key180]);
                        }
                    }elseif($next60['value'] == "180") {
                        $key180 = array_search($next60['key'], array_combine( array_keys($count180DaysLate), array_column($count180DaysLate, 'first_key')));
                        $consicutiveLateDays[$j] = $consicutiveLateDays[$j] ." ".$count180DaysLate[$key180]['count']. " 180 DAYS LATE";
                        unset($count180DaysLate[$key180]);
                    }

                }elseif($next['value'] == "90") {
                    $key90 = array_search($next['key'], array_combine( array_keys($count90DaysLate), array_column($count90DaysLate, 'first_key')));
                    $consicutiveLateDays[$j] = $consicutiveLateDays[$j] ." ".$count90DaysLate[$key90]['count']. " 90 DAYS LATE";
                    $next120 = $this->get_next($status, $count90DaysLate[$key90]['last_key']);
                    unset($count90DaysLate[$key90]);
                    if($next120['value'] == "120") {
                        $key120 = array_search($next120['key'], array_combine( array_keys($count120DaysLate), array_column($count120DaysLate, 'first_key')));
                        $consicutiveLateDays[$j] = $consicutiveLateDays[$j] ." ".$count120DaysLate[$key120]['count']. " 120 DAYS LATE";
                        $next150 = $this->get_next($status, $count120DaysLate[$key120]['last_key']);
                        unset($count120DaysLate[$key120]);
                        if($next150['value'] == "150") {
                            $key150 = array_search($next150['key'], array_combine( array_keys($count150DaysLate), array_column($count150DaysLate, 'first_key')));
                            $consicutiveLateDays[$j] = $consicutiveLateDays[$j] ." ".$count150DaysLate[$key150]['count']. " 150 DAYS LATE";
                            $next180 = $this->get_next($status, $count150DaysLate[$key150]['last_key']);
                            unset($count150DaysLate[$key150]);
                            if($next180['value'] == "180") {
                                $key180 = array_search($next180['key'], array_combine( array_keys($count180DaysLate), array_column($count180DaysLate, 'first_key')));
                                $consicutiveLateDays[$j] = $consicutiveLateDays[$j] ." ".$count180DaysLate[$key180]['count']. " 180 DAYS LATE";
                                unset($count180DaysLate[$key180]);
                            }
                        }elseif($next150['value'] == "180") {
                            $key180 = array_search($next150['key'], array_combine( array_keys($count180DaysLate), array_column($count180DaysLate, 'first_key')));
                            $consicutiveLateDays[$j] = $consicutiveLateDays[$j] ." ".$count180DaysLate[$key180]['count']. " 180 DAYS LATE";
                            unset($count180DaysLate[$key180]);
                        }
                    }elseif($next120['value'] == "150") {
                        $key150 = array_search($next120['key'], array_combine( array_keys($count150DaysLate), array_column($count150DaysLate, 'first_key')));
                        $consicutiveLateDays[$j] = $consicutiveLateDays[$j] ." ".$count150DaysLate[$key150]['count']. " 150 DAYS LATE";
                        $next180 = $this->get_next($status, $count150DaysLate[$key150]['last_key']);
                        unset($count150DaysLate[$key150]);
                        if($next180['value'] == "180") {
                            $key180 = array_search($next180['key'], array_combine( array_keys($count150DaysLate), array_column($count150DaysLate, 'first_key')));
                            $consicutiveLateDays[$j] = $consicutiveLateDays[$j] ." ".$count180DaysLate[$key180]['count']. " 180 DAYS LATE";
                            unset($count180DaysLate[$key180]);
                        }
                    }elseif($next120['value'] == "180"){
                        $key180 = array_search($next120['key'], array_combine( array_keys($count180DaysLate), array_column($count180DaysLate, 'first_key')));
                        $consicutiveLateDays[$j] = $consicutiveLateDays[$j] ." ".$count180DaysLate[$key180]['count']. " 180 DAYS LATE";
                        unset($count180DaysLate[$key180]);
                    }
                }elseif($next['value'] == "120"){
                    $key120 = array_search($next['key'], array_combine( array_keys($count120DaysLate), array_column($count120DaysLate, 'first_key')));
                    $consicutiveLateDays[$j] = $consicutiveLateDays[$j] ." ".$count60DaysLate[$key120]['count']. " 120 DAYS LATE";
                    $next150 = $this->get_next($status, $count150DaysLate[$key120]['last_key']);
                    unset($count120DaysLate[$key120]);
                    if($next150['value'] == "150") {
                        $key150 = array_search($next150['key'], array_combine( array_keys($count150DaysLate), array_column($count150DaysLate, 'first_key')));
                        $consicutiveLateDays[$j] = $consicutiveLateDays[$j] ." ".$count150DaysLate[$key150]['count']. " 150 DAYS LATE";
                        $next180 = $this->get_next($status, $count150DaysLate[$key150]['last_key']);
                        unset($count150DaysLate[$key150]);
                        if($next180['value'] == "180") {
                            $key180 = array_search($next180['key'], array_combine( array_keys($count180DaysLate), array_column($count180DaysLate, 'first_key')));
                            $consicutiveLateDays[$j] = $consicutiveLateDays[$j] ." ".$count180DaysLate[$key180]['count']. " 180 DAYS LATE";
                            unset($count180DaysLate[$key180]);
                        }
                    }elseif($next150['value'] == "180") {
                        $key180 = array_search($next150['key'], array_combine( array_keys($count180DaysLate), array_column($count180DaysLate, 'first_key')));
                        $consicutiveLateDays[$j] = $consicutiveLateDays[$j] ." ".$count180DaysLate[$key180]['count']. " 180 DAYS LATE";
                        unset($count180DaysLate[$key180]);
                    }
                }elseif($next['value'] == "150"){
                    $key150 = array_search($next['key'], array_combine( array_keys($count150DaysLate), array_column($count150DaysLate, 'first_key')));
                    $consicutiveLateDays[$j] = $consicutiveLateDays[$j] ." ".$count150DaysLate[$key150]['count']. " 150 DAYS LATE";
                    $next180 = $this->get_next($status, $count150DaysLate[$key150]['last_key']);
                    unset($count150DaysLate[$key150]);
                    if($next180['value'] == "180") {
                        $key180 = array_search($next180['key'], array_combine( array_keys($count180DaysLate), array_column($count180DaysLate, 'first_key')));
                        $consicutiveLateDays[$j] = $consicutiveLateDays[$j] ." ".$count180DaysLate[$key180]['count']. " 180 DAYS LATE";
                        unset($count180DaysLate[$key180]);
                    }

                }elseif($next['value'] == "180"){
                    $key180 = array_search($next['key'], array_combine( array_keys($count180DaysLate), array_column($count180DaysLate, 'first_key')));
                    $consicutiveLateDays[$j] = $consicutiveLateDays[$j] ." ".$count180DaysLate[$key180]['count']. " 180 DAYS LATE";
                    unset($count180DaysLate[$key180]);
                }
                $j = $j+ 1;
            }
        }

        if(!empty($count60DaysLate)){
            foreach($count60DaysLate as $value){
                $next60 = $this->get_next($status, $value['last_key']);
                $consicutiveLateDays[$j] = $value['count']. " 60 DAYS LATE";

                if($next60['value'] == "90") {
                    $key90 = array_search($next60['key'], array_combine( array_keys($count90DaysLate), array_column($count90DaysLate, 'first_key')));
                    $consicutiveLateDays[$j] = $consicutiveLateDays[$j] ." ".$count90DaysLate[$key90]['count']. " 90 DAYS LATE";
                    $next120 = $this->get_next($status, $count90DaysLate[$key90]['last_key']);
                    unset($count90DaysLate[$key90]);
                    if($next120['value'] == "120") {
                        $key120 = array_search($next120['key'], array_combine( array_keys($count120DaysLate), array_column($count120DaysLate, 'first_key')));
                        $consicutiveLateDays[$j] = $consicutiveLateDays[$j] ." ".$count120DaysLate[$key120]['count']. " 120 DAYS LATE";
                        $next150 = $this->get_next($status, $count120DaysLate[$key120]['last_key']);
                        unset($count120DaysLate[$key120]);
                        if($next150['value'] == "150") {
                            $key150 = array_search($next150['key'], array_combine( array_keys($count150DaysLate), array_column($count150DaysLate, 'first_key')));
                            $consicutiveLateDays[$j] = $consicutiveLateDays[$j] ." ".$count150DaysLate[$key150]['count']. " 150 DAYS LATE";
                            $next180 = $this->get_next($status, $count150DaysLate[$key150]['last_key']);
                            unset($count150DaysLate[$key150]);
                            if($next180['value'] == "180") {
                                $key180 = array_search($next180['key'], array_combine( array_keys($count180DaysLate), array_column($count180DaysLate, 'first_key')));
                                $consicutiveLateDays[$j] = $consicutiveLateDays[$j] ." ".$count180DaysLate[$key180]['count']. " 180 DAYS LATE";
                                unset($count180DaysLate[$key180]);
                            }
                        }elseif($next150['value'] == "180") {
                            $key180 = array_search($next150['key'], array_combine( array_keys($count180DaysLate), array_column($count180DaysLate, 'first_key')));
                            $consicutiveLateDays[$j] = $consicutiveLateDays[$j] ." ".$count180DaysLate[$key180]['count']. " 180 DAYS LATE";
                            unset($count180DaysLate[$key180]);
                        }
                    }elseif($next120['value'] == "150") {
                        $key150 = array_search($next120['key'], array_combine( array_keys($count150DaysLate), array_column($count150DaysLate, 'first_key')));
                        $consicutiveLateDays[$j] = $consicutiveLateDays[$j] ." ".$count150DaysLate[$key150]['count']. " 150 DAYS LATE";
                        $next180 = $this->get_next($status, $count150DaysLate[$key150]['last_key']);
                        unset($count150DaysLate[$key150]);
                        if($next180['value'] == "180") {
                            $key180 = array_search($next180['key'], array_combine( array_keys($count180DaysLate), array_column($count180DaysLate, 'first_key')));
                            $consicutiveLateDays[$j] = $consicutiveLateDays[$j] ." ".$count180DaysLate[$key180]['count']. " 180 DAYS LATE";
                            unset($count180DaysLate[$key180]);
                        }
                    }elseif($next120['value'] == "180") {
                        $key180 = array_search($next120['key'], array_combine( array_keys($count180DaysLate), array_column($count180DaysLate, 'first_key')));
                        $consicutiveLateDays[$j] = $consicutiveLateDays[$j] ." ".$count180DaysLate[$key180]['count']. " 180 DAYS LATE";
                        unset($count180DaysLate[$key180]);
                    }
                }elseif($next60['value'] == "120"){
                    $key120 = array_search($next60['key'], array_combine( array_keys($count120DaysLate), array_column($count120DaysLate, 'first_key')));
                    $consicutiveLateDays[$j] = $consicutiveLateDays[$j] ." ".$count120DaysLate[$key120]['count']. " 120 DAYS LATE";
                    $next150 = $this->get_next($status, $count120DaysLate[$key120]['last_key']);
                    unset($count120DaysLate[$key120]);
                    if($next150['value'] == "150") {
                        $key150 = array_search($next150['key'], array_combine( array_keys($count150DaysLate), array_column($count150DaysLate, 'first_key')));
                        $consicutiveLateDays[$j] = $consicutiveLateDays[$j] ." ".$count150DaysLate[$key150]['count']. " 150 DAYS LATE";
                        $next180 = $this->get_next($status, $count150DaysLate[$key150]['last_key']);
                        unset($count150DaysLate[$key150]);
                        if($next180['value'] == "180") {
                            $key180 = array_search($next180['key'], array_column($count180DaysLate, 'first_key'));
                            $consicutiveLateDays[$j] = $consicutiveLateDays[$j] ." ".$count180DaysLate[$key180]['count']. " 180 DAYS LATE";
                            unset($count180DaysLate[$key180]);
                        }
                    }elseif($next150['value'] == "180") {
                        $key180 = array_search($next150['key'], array_combine( array_keys($count180DaysLate), array_column($count180DaysLate, 'first_key')));
                        $consicutiveLateDays[$j] = $consicutiveLateDays[$j] ." ".$count180DaysLate[$key180]['count']. " 180 DAYS LATE";
                        unset($count180DaysLate[$key180]);
                    }
                }elseif($next60['value'] == "150") {
                    $key150 = array_search($next60['key'], array_combine( array_keys($count150DaysLate), array_column($count150DaysLate, 'first_key')));
                    $consicutiveLateDays[$j] = $consicutiveLateDays[$j] ." ".$count150DaysLate[$key150]['count']. " 150 DAYS LATE";
                    $next180 = $this->get_next($status, $count150DaysLate[$key150]['last_key']);
                    unset($count150DaysLate[$key150]);
                    if($next180['value'] == "180") {
                        $key180 = array_search($next180['key'], array_combine( array_keys($count180DaysLate), array_column($count180DaysLate, 'first_key')));
                        $consicutiveLateDays[$j] = $consicutiveLateDays[$j] . " " . $count180DaysLate[$key180]['count'] . " 180 DAYS LATE";
                        unset($count180DaysLate[$key180]);
                    }
                }elseif($next60['value'] == "180") {
                    $key180 = array_search($next60['key'], array_combine( array_keys($count180DaysLate), array_column($count180DaysLate, 'first_key')));
                    $consicutiveLateDays[$j] = $consicutiveLateDays[$j] ." ".$count180DaysLate[$key180]['count']. " 180 DAYS LATE";
                    unset($count180DaysLate[$key180]);
                }


                $j = $j+ 1;
            }
        }

        if(!empty($count90DaysLate)){
            foreach($count90DaysLate as $value){
                $next120 = $this->get_next($status, $value['last_key']);
                $consicutiveLateDays[$j] = $value['count']. " 90 DAYS LATE";

                if($next120['value'] == "120") {
                    $key120 = array_search($next120['key'], array_combine( array_keys($count120DaysLate), array_column($count120DaysLate, 'first_key')));
                    $consicutiveLateDays[$j] = $consicutiveLateDays[$j] ." ".$count120DaysLate[$key120]['count']. " 120 DAYS LATE";
                    $next150 = $this->get_next($status, $count120DaysLate[$key120]['last_key']);
                    unset($count120DaysLate[$key120]);
                    if($next150['value'] == "150") {
                        $key150 = array_search($next150['key'], array_combine( array_keys($count150DaysLate), array_column($count150DaysLate, 'first_key')));
                        $consicutiveLateDays[$j] = $consicutiveLateDays[$j] ." ".$count150DaysLate[$key150]['count']. " 150 DAYS LATE";
                        $next180 = $this->get_next($status, $count150DaysLate[$key150]['last_key']);
                        unset($count150DaysLate[$key150]);
                        if($next180['value'] == "180") {
                            $key180 = array_search($next180['key'], array_combine( array_keys($count180DaysLate), array_column($count180DaysLate, 'first_key')));
                            $consicutiveLateDays[$j] = $consicutiveLateDays[$j] ." ".$count180DaysLate[$key180]['count']. " 180 DAYS LATE";
                            unset($count180DaysLate[$key180]);
                        }
                    }elseif($next150['value'] == "180") {
                        $key180 = array_search($next150['key'], array_combine( array_keys($count180DaysLate), array_column($count180DaysLate, 'first_key')));
                        $consicutiveLateDays[$j] = $consicutiveLateDays[$j] ." ".$count180DaysLate[$key180]['count']. " 180 DAYS LATE";
                        unset($count180DaysLate[$key180]);
                    }
                }elseif($next120['value'] == "150") {
                    $key150 = array_search($next120['key'], array_combine( array_keys($count150DaysLate), array_column($count150DaysLate, 'first_key')));
                    $consicutiveLateDays[$j] = $consicutiveLateDays[$j] ." ".$count150DaysLate[$key150]['count']. " 150 DAYS LATE";
                    $next180 = $this->get_next($status, $count150DaysLate[$key150]['last_key']);
                    unset($count150DaysLate[$key150]);
                    if($next180['value'] == "180") {
                        $key180 = array_search($next180['key'], array_combine( array_keys($count180DaysLate), array_column($count180DaysLate, 'first_key')));
                        $consicutiveLateDays[$j] = $consicutiveLateDays[$j] ." ".$count180DaysLate[$key180]['count']. " 180 DAYS LATE";
                        unset($count180DaysLate[$key180]);
                    }
                }elseif($next120['value'] == "180") {
                    $key180 = array_search($next120['key'], array_combine( array_keys($count180DaysLate), array_column($count180DaysLate, 'first_key')));
                    $consicutiveLateDays[$j] = $consicutiveLateDays[$j] ." ".$count180DaysLate[$key180]['count']. " 180 DAYS LATE";
                    unset($count180DaysLate[$key180]);
                }


                $j = $j+ 1;
            }
        }

        if(!empty($count120DaysLate)){
            foreach($count120DaysLate as $value){
                $next150 = $this->get_next($status, $value['last_key']);
                $consicutiveLateDays[$j] = $value['count']. " 120 DAYS LATE";

                if($next150['value'] == "150") {
                    $key150 = array_search($next150['key'], array_combine( array_keys($count150DaysLate), array_column($count150DaysLate, 'first_key')));
                    $consicutiveLateDays[$j] = $consicutiveLateDays[$j] ." ".$count150DaysLate[$key150]['count']. " 150 DAYS LATE";
                    $next180 = $this->get_next($status, $count150DaysLate[$key150]['last_key']);
                    unset($count150DaysLate[$key150]);
                    if($next180['value'] == "180") {
                        $key180 = array_search($next180['key'], array_combine( array_keys($count180DaysLate), array_column($count180DaysLate, 'first_key')));
                        $consicutiveLateDays[$j] = $consicutiveLateDays[$j] ." ".$count180DaysLate[$key180]['count']. " 180 DAYS LATE";
                        unset($count180DaysLate[$key180]);
                    }
                }elseif($next150['value'] == "180") {
                    $key180 = array_search($next150['key'], array_combine( array_keys($count180DaysLate), array_column($count180DaysLate, 'first_key')));
                    $consicutiveLateDays[$j] = $consicutiveLateDays[$j] ." ".$count180DaysLate[$key180]['count']. " 180 DAYS LATE";
                    unset($count180DaysLate[$key180]);
                }

                $j = $j+ 1;
            }
        }

        if(!empty($count150DaysLate)){
            foreach($count150DaysLate as $value){
                $next180 = $this->get_next($status, $value['last_key']);
                $consicutiveLateDays[$j] = $value['count']. " 150 DAYS LATE";

                if($next180['value'] == "180") {
                    $key180 = array_search($next180['key'], array_combine( array_keys($count180DaysLate), array_column($count180DaysLate, 'first_key')));
                    $consicutiveLateDays[$j] = $consicutiveLateDays[$j] ." ".$count180DaysLate[$key180]['count']. " 180 DAYS LATE";
                    unset($count180DaysLate[$key180]);
                }


                $j = $j+ 1;
            }
        }

        if(!empty($count180DaysLate)){
            foreach($count180DaysLate as $value){
                $consicutiveLateDays[$j] = $value['count']. " 180 DAYS LATE";

                $j = $j+ 1;
            }
        }

        dd($consicutiveLateDays, $lates);
        dd($count30DaysLate,'++++++', empty($count60DaysLate), $count90DaysLate, empty($count120DaysLate), $count150DaysLate, $count180DaysLate);

//
//
//        dd('das');
//
//        $key30 = array_search("30", $status);
//        if($key30 !== false){
//            $count30 = 1;
//            $next = $this->count30DaysLate($key30, $status, $count30);
//        }else{
//            $count30 = 0;
//            $next = null;
//        }
//        if( $lates["CRD"] != 0 || $lates["FS"] != 0 ||
//            $lates["F"] != 0 || $lates["VS"] != 0 ||
//            $lates["R"] != 0 || $lates["PBC"] != 0 ||
//            $lates["IC"] != 0 || $lates["G"] != 0 ||
//            $lates["D"] != 0 || $lates["C"] != 0 ||
//            $lates["CO"] != 0 || $lates["CLS"] != 0){
//
//            //harcnel $lates["CLS"]
////            @Todo: QNNARKEL
//         return " ";
//        }
//
//
//        if( $lates["60"] == 0 &&  $lates["90"] == 0 &&
//            $lates["120"] == 0 && $lates["150"] == 0 &&
//            $lates["180"] == 0
//        ){
//            if (is_null($lates["30"])) {
//                return "NO LATE";
//            }
//            if ( $lates["30"] == 1) {
//                return  "SIMPLE 30 DAYS LATE";
//            }else {
//
//                if($next['count'] == $lates["30"]){
//                    return  $next['count'] ."CONSECUTIVE 30 DAYS LATE";
//                }else{
//                    dd( $lates["30"]. " NON CONSECUTIVE 30 days late");
//
//                    return $lates["30"]. " NON CONSECUTIVE 30 days late";
//                }
//            }
//        }
//
//        if ($lates["90"] == 0 && $lates["120"] == 0 &&
//            $lates["150"] == 0 && $lates["180"] == 0 ) {
//            if ($lates["60"] == 1) {
//                if ($lates["30"] == 0) {
//                    return "SIMPLE 60 DAYS LATE";
//                }
//
//                if ($lates["30"] == 1) {
//                    if ($next['value'] == "60") {
//                        return "CONSECUTIVE SIMPLE 30 DAYS LATE, 60 DAYS LATE";
//                    } else {
//                        dd('asdasd');
//                        return "NON CONSECUTIVE SIMPLE 30 DAYS LATE, 60 DAYS LATE";
//                    }
//                } else {
//                    if ($next['value'] == "60") {
//                        if ( $next['prev_key'] == end($keys30)) {
//                            return  "CONSECUTIVE".$count30 ." 30 DAYS LATE,  SIMPLE 60 DAYS LATE";
//                        } else {
//                            return " ";
//                        }
//                    }
//
//                    if( $next['prev_key'] == end($keys30)){
//                        return  "CONSECUTIVE". $count30 . "  30 day late and NON CONSECUTIVE SIMPLE 60 day late";
//                    }elseif( $next['prev_key'] != end($keys30)){
//                        $next30Key = $this->get_next($status, $next['prev_key']);
//                        $countCons30 = 1;
//                        $countCons30Next = $this->count30DaysLate($next30Key, $status, $count30);
//                        if($countCons30Next['value'] == "60" && $countCons30Next['prev_key'] != end($keys30)){
//                            return $count30." 30 days late and CONSECUTIVE". $countCons30 ."30 day late and SIMPLE 60 day late";
//                        }
//                    }
//                }
//            }
//
//        }

//      if(
//            $lates["30"] == 1 && $lates["60"] == 1 &&
//            $countByType["90"] == 0 && $lates["120"] == 0 &&
//            $countByType["150"] == 0 && $lates["180"] == 0
//
//      ){
//            if($next['value'] == "60"){
//                return  "CONSECUTIVE SIMPLE 30 day late, 60 day late";
//            }else{
//                return  "NON CONSECUTIVE SIMPLE 30 day late, 60 day late";
//            }
//        }elseif(
//            $lates["30"] >= 1 && $lates["60"] == 1 &&
//            $countByType["90"] == 0 && $lates["120"] == 0 &&
//            $countByType["150"] == 0 && $lates["180"] == 0 &&
//
//        ){
//            if($next['value'] == "60" && $next['prev_key'] == end($keys30)){
//                return  "CONSECUTIVE".$count30 ."30 day late,  SIMPLE 60 day late";
//            }elseif($next['value'] != "60" && $next['prev_key'] == end($keys30)){
//                return  "CONSECUTIVE". $count30 . "  30 day late and SIMPLE 60 day late";
//            }elseif($next['value'] != "60" && $next['prev_key'] != end($keys30)){
//                $next30Key = $this->get_next($status, $next['prev_key']);
//                $countCons30 = 1;
//                $countCons30Next = $this->count30DaysLate($next30Key, $status, $count30);
//                if($countCons30Next['value'] == "60" && $countCons30Next['prev_key'] != end($keys30)){
//                    return $count30." 30 days late and CONSECUTIVE". $countCons30 ."30 day late and SIMPLE 60 day late";
//                }
//
//            }
//        }

        if($key30 !== false) {
            $count30 = 1;
            $next = $this->count30DaysLate($key30, $status, $count30);

            if ($next['value'] == "OK" && $lates["60"] == 0 &&
                $countByType["90"] == 0 && $lates["120"] == 0 &&
                $countByType["150"] == 0 && $lates["180"] == 0 &&
                $lates["CRD"] == 0 && $lates["FS"] == 0 &&
                $lates["F"] == 0 && $lates["VS"] == 0 &&
                $lates["R"] == 0 && $lates["PBC"] == 0 &&
                $lates["IC"] == 0 && $lates["G"] == 0 &&
                $lates["D"] == 0 && $lates["C"] == 0 &&
                $lates["CO"] == 0 && $lates["CLS"] == 0
                && end($keys30) == $next['prev_key']) {
                return $count30 . " 30 day late";
            }elseif($next['value'] == "OK" &&
                $countByType["90"] == 0 && $lates["120"] == 0 &&
                $countByType["150"] == 0 && $lates["180"] == 0 &&
                $lates["CRD"] == 0 && $lates["FS"] == 0 &&
                $lates["F"] == 0 && $lates["VS"] == 0 &&
                $lates["R"] == 0 && $lates["PBC"] == 0 &&
                $lates["IC"] == 0 && $lates["G"] == 0 &&
                $lates["D"] == 0 && $lates["C"] == 0 &&
                $lates["CO"] == 0 && $lates["CLS"] == 0
                && end($keys30) != $next['prev_key']){
                return $lates['30'] . " 30 day late";
            }

        }

        dd(array_keys($status, "OK") , $status);



        if($key30 !== false){
            $count30 = 1;
            $next = $this->count30DaysLate($key30, $status, $count30);
            if($next['value'] == "OK" && $lates["60"] == 0  &&
                $countByType["90"] == 0 && $lates["120"] == 0 &&
                $countByType["150"] == 0 && $lates["180"] == 0 &&
                $lates["CRD"] == 0 && $lates["FS"] == 0 &&
                $lates["F"] == 0 && $lates["VS"] == 0 &&
                $lates["R"] == 0 && $lates["PBC"] == 0 &&
                $lates["IC"] == 0 && $lates["G"] == 0 &&
                $lates["D"] == 0 && $lates["C"] == 0 &&
                $lates["CO"] == 0 && $lates["CLS"] == 0){

                $count30 = $lates["60"]> $count30? $lates["60"]:$count30;
                return $count30." 30 day late";

            }elseif($next['value'] == "60"){
                $next90 = $this->get_next($status, $next['key']);

                if($next90['value'] == "OK" && $lates["60"] == 1  &&
                    $countByType["90"] == 0 && $lates["120"] == 0 &&
                    $countByType["150"] == 0 && $lates["180"] == 0 &&
                    $lates["CRD"] == 0 && $lates["FS"] == 0 &&
                    $lates["F"] == 0 && $lates["VS"] == 0 &&
                    $lates["R"] == 0 && $lates["PBC"] == 0 &&
                    $lates["IC"] == 0 && $lates["G"] == 0 &&
                    $lates["D"] == 0 && $lates["C"] == 0 &&
                    $lates["CO"] == 0 && $lates["CLS"] == 0){
                    return $count30." 30 day late,  60 day late";
                }elseif($next90 == '90'){
                    $next120 = $this->get_next($status, $next90['key']);
                    if($next120['value'] == "OK"  && $lates["120"] == 0 &&
                        $countByType["150"] == 0 && $lates["180"] == 0 &&
                        $lates["CRD"] == 0 && $lates["FS"] == 0 &&
                        $lates["F"] == 0 && $lates["VS"] == 0 &&
                        $lates["R"] == 0 && $lates["PBC"] == 0 &&
                        $lates["IC"] == 0 && $lates["G"] == 0 &&
                        $lates["D"] == 0 && $lates["C"] == 0 &&
                        $lates["CO"] == 0 && $lates["CLS"] == 0){
                        return $count30." 30 day late,  60 day late,  90 day late";
                    } elseif($next120 = "120"){
                        $next150 = $this->get_next($status, $next120['key']);
                        if($next120['value'] == "OK"  && $lates["120"] == 0 &&
                            $countByType["150"] == 0 && $lates["180"] == 0 &&
                            $lates["CRD"] == 0 && $lates["FS"] == 0 &&
                            $lates["F"] == 0 && $lates["VS"] == 0 &&
                            $lates["R"] == 0 && $lates["PBC"] == 0 &&
                            $lates["IC"] == 0 && $lates["G"] == 0 &&
                            $lates["D"] == 0 && $lates["C"] == 0 &&
                            $lates["CO"] == 0 && $lates["CLS"] == 0){
                            return $count30." 30 day late,  60 day late,  90 day late, 120 day late";
                        }elseif($next150 = "150") {
                            $next180 = $this->get_next($status, $next150['key']);
                        }
                    }


                }
            }


            dd($next,  $countByType);
        }



    }

    public function countDaysLate($lateKeys)
    {
        $countDaysLate = [];
        $first = null;
        $count = 0;
        $i = 0;
        foreach($lateKeys as $key => $late30){
            if(count($lateKeys) == 1){
                $countDaysLate[0] = [
                    'count'=>1,
                    'last_key' => $late30,
                    'first_key'=> $late30
                ];
            }elseif(count($lateKeys) == 2){
                if(isset($lateKeys[$key+1])){
                    if($lateKeys[$key+1] - $late30 === 1){
                        $count = 2;
                        $countDaysLate[$i]['count'] = $count;
                        $countDaysLate[$i]['count'] = $lateKeys[$key+1];
                        $countDaysLate[$i]['first_key'] = is_null($first)?$lateKeys[0]:$countDaysLate[$i]['first_key'];
                        break;
                    }else{
                        $count = 1;
                        $countDaysLate[$i]['count'] = $count;
                        $countDaysLate[$i]['last_key'] = $lateKeys[$key];
                        $countDaysLate[$i]['first_key'] = $lateKeys[$key];
                        $i = $i + 1;
                    }
                }else{
                    $count = 1;
                    $countDaysLate[$i]['count'] = $count;
                    $countDaysLate[$i]['last_key'] = $lateKeys[$key];
                    $countDaysLate[$i]['first_key'] = $lateKeys[$key];
                    $i = $i + 1;
                }
            }elseif($key < count($lateKeys)-2){
                if($lateKeys[$key+1] - $late30 === 1){
                    $count = $count + 1;
                    $countDaysLate[$i]['count'] = $count;
                    $countDaysLate[$i]['count'] = $lateKeys[$key+1];
                    $countDaysLate[$i]['first_key'] = is_null($first)?$lateKeys[0]:$countDaysLate[$i]['first_key'];
                }else{

                    $count = $count + 1;
                    $countDaysLate[$i]['count'] = $count;
                    $countDaysLate[$i]['last_key'] = $late30;
                    $countDaysLate[$i]['first_key'] = is_null($first)?$lateKeys[0]:$countDaysLate[$i]['first_key'];

                    if($key < count($lateKeys)-3){
                        $i = $i + 1;
                        $count = 0;
                        $first = $lateKeys[$key+1];
                        $countDaysLate[$i]['count'] = $count;
                        $countDaysLate[$i]['last_key'] = $lateKeys[$key+1];
                        $countDaysLate[$i]['first_key'] = $lateKeys[$key+1];
                    }
                }
            }else{
                if($late30 - $lateKeys[$key-1] === 1){
                    $count = $count + 1;
                    $countDaysLate[$i]['count'] = $count;
                    $countDaysLate[$i]['last_key'] = $late30;
                    $countDaysLate[$i]['first_key'] = !isset($countDaysLate[$i]['first_key'])?$lateKeys[0]:$countDaysLate[$i]['first_key'];
                }else{
                    $i = $i + 1;
                    $count = 1;
                    $countDaysLate[$i]['count'] = $count;
                    $countDaysLate[$i]['last_key'] = $late30;
                    $countDaysLate[$i]['first_key'] = $late30;
                }
            }
        }
        return $countDaysLate;
    }

    public function  get_next($array, $key)
    {
       $currentKey = key($array);
       while ($currentKey !== null && $currentKey != $key) {
           next($array);
           $currentKey = key($array);
       }

       $value = next($array);
       $key = key($array);

        return ['key' => $key, 'value' => $value];
    }

    public function count30DaysLate($key30, $status, $count30)
    {
        $next =  $this->get_next($status, $key30);
        if($next['value'] == $status[$key30]){
            $count30 = $count30 + 1;
            return $this->count30DaysLate( $next['key'], $status, $count30);
        }else{
            return ['prev_key'=>$key30,  'key'=>$next['key'], 'value'=>$next['value'], 'count'=> $count30];
        }

    }

    public function exLates($rating)
    {
        $lates = [];
        $lates["30"] = isset($rating['30'])?$rating['30']:null;
        $lates["60"] = isset($rating['60'])?$rating['60']:null;
        $lates["90"] = isset($rating['90'])?$rating['90']:null;
        $lates["120"] = isset($rating['120'])?$rating['120']:null;
        $lates["150"] = isset($rating['150'])?$rating['150']:null;
        $lates["180"] = isset($rating["180"])?$rating["180"]:null;
        $lates["CRD"] = isset($rating["CRD"])?$rating["Y"]:null;
        $lates["FS"] = isset($rating["FS"])?$rating["FS"]:null;
        $lates["F"] = isset($rating["F"])?$rating["F"]:null;
        $lates["VS"] = isset($rating["VS"])?$rating["VS"]:null;
        $lates["R"] = isset($rating["R"])?$rating["R"]:null;
        $lates["PBC"] = isset($rating["PBC"])?$rating["PBC"]:null;
        $lates["IC"] = isset($rating["IC"])?$rating["IC"]:null;
        $lates["G"] = isset($rating["G"])?$rating["G"]:null;
        $lates["D"] = isset($rating["D"])?$rating["D"]:null;
        $lates["C"] = isset($rating["C"])?$rating["C"]:null;
        $lates["CO"] = isset($rating["CO"])?$rating["CO"]:null;
        $lates["CLS"] = isset($rating["CLS"])?$rating["CLS"]:null;

        return $lates;
    }
    /**
     * split address string
     */
    public function splitAddress($address)
    {

        $addressState = "/.+?(AL|AK|AS|AZ|AR|CA|CO|CT|DE|DC|FM|FL|GA|GU|HI|ID|IL|IN|IA|KS|KY|LA|ME|MH|MD|MA|MI|MN|MS|MO|
                    MT|NE|NV|NH|NJ|NM|NY|NC|ND|MP|OH|OK|OR|PW|PA|PR|RI|SC|SD|TN|TX|UT|VT|VI|VA|WA|WV|WI|WY)+\s+\b[0-9]{5,}/";

        preg_match($addressState, $address, $matcheSate);
        $state = isset($matcheSate[1])?$matcheSate[1]:null;
        if($state != null){
            $explodeAddress = explode(' '.$state.' ', $address);
            $zipCode = isset($explodeAddress[1])?trim($explodeAddress[1]):null;
            $city = null;
            $street = null;
            $aptRegex = "/(apt[A-z0-9]{1,2}\s|apt[A-z0-9]{1,2}\,|apt\s[A-z0-9]{1,2}\s|apt\s\#\s[A-z0-9]{1,2}\s|apt\s\#[A-z0-9]{1,2}\s|\#\s[A-z0-9]{1,2}\s|apta[A-z0-9]{1,2}\s|apta\s[A-z0-9]{1,2}\s|\#[A-z0-9]{1,2}|\#\s[A-z0-9]{1,2}|APTA\-[A-Z0-9]{1,2}|APTA\s\-[A-Z0-9]{1,2}|APTA\-\s[A-Z0-9]{1,2}|bsmt[A-z0-9]{1,2}|bsmt\s[A-z0-9]{1,2}|bldg[A-z0-9]{1,2}|bldg\s[A-z0-9]{1,2}|dept[A-z0-9]{1,2}|dept\s[A-z0-9]{1,2}|fl[A-z0-9]{1,2}|FL [A-z0-9]{1,2}|frnt[A-z0-9]{1,2}|frnt\s[A-z0-9]{1,2}|hngr[A-z0-9]{1,2}|hngr\s[A-z0-9]{1,2}|key[A-z0-9]{1,2}|key\s[A-z0-9]{1,2}|lbby[A-z0-9]{1,2}|lbby\s[A-z0-9]{1,2}|lot[A-z0-9]{1,2}|lot\s[A-z0-9]{1,2}|lowr[A-z0-9]{1,2}|lowr\s[A-z0-9]{1,2}|ofc[A-z0-9]{1,2}|ofc\s[A-z0-9]{1,2}|ph[A-z0-9]{1,2}|ph\s[A-z0-9]{1,2}|pier[A-z0-9]{1,2}|pier\s[A-z0-9]{1,2}|rear[A-z0-9]{1,2}|rear\s[A-z0-9]{1,2}|rm[A-z0-9]{1,2}|rm\s[A-z0-9]{1,2}|side[A-z0-9]{1,2}|side\s[A-z0-9]{1,2}|slip[A-z0-9]{1,2}|slip\s[A-z0-9]{1,2}|stop[A-z0-9]{1,2}|stop\s[A-z0-9]{1,2}|ste[A-z0-9]{1,2}|ste\s[A-z0-9]{1,2}|TRLR[A-z0-9]{1,2}|TRLR\s[A-z0-9]{1,2}|UNIT[A-z0-9]{1,2}|UNIT\s[A-z0-9]{1,2}|UPPR[A-z0-9]{1,2}|UPPR\s[A-z0-9]{1,2})/i";
            $addressStreet = "/(STE+\s+[0-9]{1,}|\sstreet|\sst|\sAVENUE|\sAVE|\sPLACE|\sPL|\sROAD|\sRD|\sSQUARE|\sSQ|\sBoulevard|\sBLVD|\sTERRACE|\sTER|\sDrive|\sDR|\sCourt|\sCT|\sBuilding|\sBLDG|\slane|\sln|\sway|\sCT)/i";

            $poBoxReg = '/(.|)+(P\.O\. BOX|POB|PO BOX|PO Box|P O Box)\s[0-9]{1,}\s/im';
            preg_match($poBoxReg, $explodeAddress[0], $matchesPoBox);

            if(isset($matchesPoBox[0])){
                $street = isset($matchesPoBox[0])?trim($matchesPoBox[0]):null;
                $city = trim(str_replace([$street, ','], '', $explodeAddress[0]));
                return [
                    'street'=>$street,
                    'state'=>$state,
                    'city'=>$city,
                    'zip'=>$zipCode,
                ];
            }else{
                preg_match($aptRegex, $explodeAddress[0], $matchesApt);
                if(isset($matchesApt[0])){
                    $streetCity = explode($matchesApt[0], $explodeAddress[0]);
                    $city = isset($streetCity[1])?trim(str_replace(",","",$streetCity[1])):null;
                    $street = trim($streetCity[0].$matchesApt[0]);
                }else{
                    preg_match_all($addressStreet, $explodeAddress[0], $matchesStreet);
                    if (!empty($matchesStreet[0])) {
                        $streetCity = explode($matchesStreet[0][count($matchesStreet[0])-1], $explodeAddress[0]);
                        $city = isset($streetCity[1])?trim(str_replace(",","",$streetCity[1])):null;
                        $street = trim($streetCity[0].$matchesStreet[0][count($matchesStreet[0])-1]);
                    }

                }
                return [
                    'street'=>$street,
                    'state'=>$state,
                    'city'=>$city,
                    'zip'=>$zipCode,
                ];

            }

        }else{
            return [
                'street'=>null,
                'state'=>$state,
                'city'=>null,
                'zip'=>null,
            ];
        }
    }




}
