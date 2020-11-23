<?php

namespace App\Http\Controllers;

use App\ClientReport;
use App\Credential;
use App\Disputable;
use App\Jobs\FetchReports;
use App\Services\ClientDetailsNewData;
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

    public function __construct()
    {
        $this->middleware(['auth', 'verified' ,'affiliate']);
    }

    public function index()
    {
        $affiliateId = Auth::user()->id;
        $clients = Affiliate::where('affiliate_id', $affiliateId)->get();
        return view('affiliate.index', compact('clients'));
    }

    public function createClient()
    {
        $secrets=DB::table('secret_questions')->select('question','id')->get();
        return view('affiliate.create-client', compact('secrets'));
    }

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
        $affiliateId = Auth::user()->id;

        $user = User::create([
            'email'=>$clientData['email'],
            'secret_questions_id' => $clientData['secret_questions_id'],
            'secret_answer' =>$clientData['secret_answer'],
            'role'=>'client'
        ]);
        $userId = $user->id;

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

        $user->sendEmailVerificationNotification();

        return redirect(route('affiliate.client.document', ['client'=>$userId]))->with('success', "You created  new customer");

    }

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

        return view('affiliate.create-client-dl-ss', compact('clients', 'step'));

    }

    public function storeDLSS(Request $request, ClientDetailsNewData $clientDetailsNewData)
    {
        $user = $request->client;
        $affiliateId = Auth::user()->id;
        $a = Affiliate::where('affiliate_id', $affiliateId)
            ->where('user_id', $user)->first();
        if(empty($a)){
            return back();
        }

        $client = User::where('id', $user)->first();
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

        $user = Arr::only($resultDriverLicense, ['first_name', 'last_name']);
        $clientData =  Arr::except($resultDriverLicense, ['first_name', 'last_name']);
        $clientData['ssn'] = isset($resultSocialSecurity['ssn']) ? $resultSocialSecurity['ssn'] : '';
        $clientData["dob"] = isset($clientData['dob']) ? date('Y-m-d', strtotime($clientData['dob'])) : '';
        $clientData['user_id'] = $client;


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
            $client->clientDetails->update(['registration_steps' => 'credentials']);
        }
//        $request->session()->put('bad',true);


        if (empty(ClientDetail::where('user_id', $client->id)->first())) {
            User::where('id', $client->id)->update($user);
            ClientDetail::create($clientData);
        } else {
            UploadClientDetail::insert(array_merge($user, $clientData));
        }
        $clientId = $client->id;

        return redirect(route('affiliate.client.credentials', compact('clientId')))->with('success', "Please check your data");

    }

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
        $uploadUserDetail = UploadClientDetail::where('user_id', $user)->first();

        return view('affiliate.create-client-credentials', compact('clients', 'step', 'uploadUserDetail'));

    }

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
        return view('affiliate.client-review', compact('client', 'step'));

    }

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
//            if ($registration_steps == 'review') {
//                FetchReports::dispatch($client);
//                return redirect(route('client.details.create'));
//            }
            return redirect(route('affiliate.client.profile', $id))->with('success', "your data saved");

        }

    }



    public function clientProfile(Request $request, $id)
    {

        $affiliateId = Auth::user()->id;
        $a = Affiliate::where('affiliate_id', $affiliateId)
            ->where('user_id', $id)->first();
        if(empty($a)){
            return back();
        }

        $clients = User::where('id', $id)->first();
        $step = $clients->clientDetails['registration_steps'];
        if($step =='null'){
            return redirect(route('affiliate.create.client'));

        } elseif($step =='documents'){
            return redirect(route('affiliate.client.document', ['client'=>$id]));

        }elseif($step =='credentials'){
            $clientId = $id;
            return redirect(route('affiliate.client.credentials', compact('clientId')))
        }elseif($step =='review'){
            $clientId = $id
            return redirect(route('affiliate.clientReview', compact('clientId')))
        }
        
        $client = User::whereId($id)->first();
        $toDos = Todo::where('client_id', $client->id)->get();
        $status = [null => ''] + \App\Todo::STATUS;
        $reportsDateEQ = ClientReport::where('user_id', auth()->user()->id)
            ->where('type', "EQ")->pluck('created_at', 'id')->toArray();
        $reportsDateEX = ClientReport::where('user_id', auth()->user()->id)
            ->where('type', "EX_LOG")->pluck('created_at', 'id')->toArray();
        $reportsDateTU = ClientReport::where('user_id', auth()->user()->id)
            ->where('type', "TU_DIS")->pluck('created_at', 'id')->toArray();

        $requiredInfoArr = Todo::
        leftJoin('disputables', 'todos.id','=','disputables.todo_id')
            ->where('client_id', $client->id)
            ->whereJsonContains('additional_information', ['security_word' => null])
            ->pluck('disputables.id')
            ->toArray();

        $requiredInfo = Disputable::whereIn('id',$requiredInfoArr )->get();


        return view('affiliate.client-profile', compact('client', 'toDos', 'status', 'reportsDateEX','reportsDateEQ','reportsDateTU','requiredInfo'));

    }



    public function storeClientDetails(Request $request, $client)
    {

        $affiliate = Affiliate::where('id', $client)->first();

        $clientId = User::where('id', $affiliate->user_id)->first();

        $data = $request->client;

        $validation = Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'dob' => ['required'],
            'sex'=> ['required'],
            'ssn'=> ['required', 'string', 'max:255'],
            'address'=> ['required', 'string', 'max:255'],
            'zip'=> ['required', 'string', 'max:255'],
            'phone_number'=> ['required', 'string', 'max:255'],
        ]);


        if ($validation->fails()) {

            return view('affiliate.create-client-detail', compact('client'))->withErrors($validation);
        } else {

            $user = Arr::only($request->client, ['first_name', 'last_name']);
            $clientDetails = Arr::except($request->client, ['first_name', 'last_name']);
            $clientDetails["user_id"] = $clientId->id;
            $clientDetails["address"] = strtoupper($clientDetails["address"]);


            if(empty(ClientDetail::where('user_id',$clientId->id )->first())){
                ClientDetail::create($clientDetails);
                User::where('id', $clientId->id)->update([
                    'first_name' => strtoupper($user['first_name']),
                    'last_name' => strtoupper($user['last_name'])
                ]);
            }else{
                ClientDetail::where('user_id',$clientId->id)->update($clientDetails);
            }

            return redirect(route('affiliate.index'))->with('success', "your data saved");
        }
    }

    public function editClientDetails($affiliateId)
    {

        $affiliate = Affiliate::where('id', $affiliateId)->first();

        $user = User::where('id', $affiliate->user_id)->first();

        $uploadUserDetail = UploadClientDetail::where('user_id',$user->id )->first();


        if (!empty($uploadUserDetail)) {
            return view('affiliate.edit-with-upload-data', compact('user', 'uploadUserDetail'));
        }
        return view('affiliate.edit-client-detail', compact('user'));

    }

    public function updateClientDetails(Request $request, $id)
    {
        $data = $request->client;
        $data["sex"] = isset($data["sex"]) ? $data["sex"] : $data["sex_uploaded"];

        $uploaded = UploadClientDetail::where("user_id", $id);

        $validation = Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'dob' => ['required'],
            'sex'=> ['required'],
            'ssn'=> ['required', 'string', 'max:255'],
            'address'=> ['required', 'string', 'max:255'],
            'zip'=> ['required', 'string', 'max:255'],
        ]);


        if ($validation->fails()) {

            return view('affiliate.editClientDetails')->withErrors($validation);
        } else {



            $user = Arr::only($request->client, ['first_name', 'last_name']);
            $clientDetails = Arr::except($request->client, ['first_name', 'last_name']);
            $clientDetails['address'] = strtoupper($clientDetails['address']);

            User::where('id', $id)->update([
                'first_name' => strtoupper($user['first_name']),
                'last_name' => strtoupper($user['last_name'])
            ]);

            ClientDetail::where('user_id', $id)->update($clientDetails);

            $uploaded->delete();
            return redirect(route('affiliate.index'))->with('success', "your data saved");

        }
    }


    public function addDLSS($client)
    {
        $clientId = $client;
        return view('affiliate.create-client-dl-ss', compact('clientId'));
    }

    public function importantInformation(Request $request)
    {
        $userId = Auth::user()->id;
        if ($request->method() == "GET") {

            $client = User::where('id', $userId)->first();

            $secrets = DB::table('secret_questions')->select('question', 'id')->get();

            return view('affiliate.important-information', compact('client', 'secrets'));

        } elseif ($request->method() == "POST") {
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
