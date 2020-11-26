<?php

namespace App\Http\Controllers;

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
use App\Disputable;
use App\Jobs\FetchReports;
use App\Mail\CredentialNotifications;
use App\Services\ClientDetailsNewData;
use App\Services\Escrow;
use App\Services\ReadPdfData;
use App\Todo;
use Doctrine\DBAL\Driver\IBMDB2\DB2Driver;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Auth;
use App\User;
use App\ClientDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Services\ClientDetailsData;
use App\Services\CreditReportUpload;
use App\ClientAttachment;
use App\Credential;
use App\UploadClientDetail;
use App\Services\Screaper;
use PhpOffice\PhpWord\Element\Image;
use PhpOffice\PhpWord\Element\Table;
use PhpOffice\PhpWord\Settings;
use PhpOffice\PhpWord\SimpleType\TblWidth;

class ClientDetailsController extends Controller
{
    public function __construct()
    {

        $this->middleware(['auth', 'verified']);
        $this->middleware('client', ['except' => 'store']);
    }

    public function index(Escrow $escrow)
    {
        $client = Auth::user();
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
        $added = !empty($statusArray) && !is_null($statusInactive)? $statusInactive:0;
        $non_data = empty($statusArray) ? 1:0;

        $statusDispute = json_encode([
            'active' => $active,
            'pending' => $pending,
            'complete'=> $complete,
            'added' => $added,
            'non_data' => $non_data,

        ]);

        return view('client_details.index', compact('client', 'toDos', 'status', 'reportsDateEX','reportsDateEQ','reportsDateTU','requiredInfo', 'statusDispute'));
    }

    public function create(Request $request)
    {
        $client = Auth::user();

        if ($client->clientAttachments->whereIn("category", ["DL", "SS"])->count() == 2) {
            if ($request->skip) {
                $client->clientDetails->update(["registration_steps" => "credentials"]);
            }
        }
        $uploadUserDetail = UploadClientDetail::where('user_id', $client->id)->first();
        return view('client_details.create', compact('client', 'uploadUserDetail'));
    }

    public function store(Request $request)
    {
        $data = $request->client;
        $validation = Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'dob' => ['required'],
            'sex' => ['required'],
            'ssn' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'zip' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'string', 'max:255'],
        ]);

        if ($validation->fails()) {

            return view('client_details.create')->withErrors($validation);
        } else {

            $id = Auth::user()->id;
            $user = Arr::only($request->client, ['first_name', 'last_name']);
            $clientDetails = Arr::except($request->client, ['first_name', 'last_name']);
            $clientDetails["user_id"] = $id;

//            User::where('id', $id)->update($user);

            if (empty(ClientDetail::where('user_id', $id)->first())) {
                ClientDetail::create($clientDetails);
            } else {
                ClientDetail::where('user_id', $id)->update($clientDetails);
            }

            return redirect(route('client.details.index'))->with('success', "your data saved");
        }
    }

    public function edit($id, Request $request)
    {
        $client = Auth::user();

        $uploadUserDetail = UploadClientDetail::where('user_id', $client->id)->first();
        if (!empty($uploadUserDetail)) {
            return view('client_details.edit', compact('client'));
        }
        return view('client_details.edit', compact('client'));
    }

    public function update(Request $request)
    {

        $data = $request->client;
        $data["sex"] = isset($data["sex"]) ? $data["sex"] : $data["sex_uploaded"];
        $full_name = explode(" ", $data["full_name"]);
        $data["first_name"] = array_shift($full_name);
        $data["last_name"] = implode(" ", $full_name);
        $id = Auth::user()->id;
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
            return view('client_details.create')->withErrors($validation);
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
            if ($registration_steps == 'review') {
                FetchReports::dispatch($client);
                return redirect(route('client.details.create'));
            }
            return redirect(route('client.details.index'))->with('success', "your data saved");

        }
    }

    public function credentials($source = null)
    {
        $client = Auth::user();
        return view('client_details.create-credentials', compact('client', 'source'));
    }

    public function credentialsStore(Request $request)
    {

        $userId = Auth::user()->id;
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

        return redirect('client/details');
    }

    public function addDlSs()
    {
        $client = Auth::user();
        return view('client_details.upload-dl-ss', compact("client"));
    }

    //create or update for client details

    public function storeDlSs(Request $request, ClientDetailsData $clientDetailsData, ClientDetailsNewData $clientDetailsNewData)
    {
        $client = Auth::user()->id;
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

        $path = "files/client/details/image/" . $client . "/";

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
                 'driver_license'=>'Your uploaded Driver License/ID is not readable or incorrect',
                 'social_security'=> 'Your uploaded Social Security Card is not readable or incorrect'
             ];
            return redirect()->back()->withErrors($error);
        }elseif(isset($resultDriverLicense['error'])){
            $error = [
                'driver_license'=>'Your uploaded Driver License/ID is not readable or incorrect'
            ];
            return redirect()->back()->withErrors($error);
        }elseif(isset($resultSocialSecurity['error'])){
            $error = [
                'social_security'=> 'Your uploaded Social Security Card is not readable or incorrect'
            ];
            return redirect()->back()->withErrors($error);
        }

        $user = Arr::only($resultDriverLicense, ['first_name', 'last_name']);
        $clientData =  Arr::except($resultDriverLicense, ['first_name', 'last_name']);
        $clientData['ssn'] = isset($resultSocialSecurity['ssn']) ? $resultSocialSecurity['ssn'] : '';
        $clientData["dob"] = isset($clientData['dob']) ? date('Y-m-d', strtotime($clientData['dob'])) : '';
        $clientData['user_id'] = $client;

        $clientAttachmentData = [
            [
                'user_id' => $client,
                'path' => $pathDriverLicense,
                'file_name' => $nameDriverLicense,
                'category' => 'DL',
                'type' => $driverLicenseExtension
            ],
            [
                'user_id' => $client,
                'path' => $pathSocialSecurity,
                'file_name' => $nameSocialSecurity,
                'category' => 'SS',
                'type' => $socialSecurityExtension
            ]
        ];

        if (empty(ClientAttachment::where('user_id', $client)->first())) {
            ClientAttachment::insert($clientAttachmentData);
        } elseif (empty(ClientAttachment::where('user_id', $client)->where('category', 'DL')->first())) {

            ClientAttachment::insert($clientAttachmentData[0]);
            ClientAttachment::where('user_id', $client)->where('category', 'SS')->update($clientAttachmentData[1]);
        } elseif (empty(ClientAttachment::where('user_id', $client)->where('category', 'SS')->first())) {

            ClientAttachment::insert($clientAttachmentData[1]);
            ClientAttachment::where('user_id', $client)->where('category', 'DL')->update($clientAttachmentData[0]);
        } else {
            ClientAttachment::where('user_id', $client)->where('category', 'DL')->update($clientAttachmentData[0]);
            ClientAttachment::where('user_id', $client)->where('category', 'SS')->update($clientAttachmentData[1]);

        }
        $c = Auth::user();

//        if(count($resultDriverLicense) != 9 || count($resultSocialSecurity) != 3){
//            $request->session()->put('bad',true);
//        }elseif ($c->clientDetails->registration_steps =='documents') {
//            $c->clientDetails->update(['registration_steps'=>'credentials']);
//        }

        if ($c->clientDetails->registration_steps == 'documents') {
            $c->clientDetails->update(['registration_steps' => 'credentials']);
        }
//        $request->session()->put('bad',true);


        if (empty(ClientDetail::where('user_id', $client)->first())) {
            User::where('id', $client)->update($user);
            ClientDetail::create($clientData);
        } else {
            UploadClientDetail::insert(array_merge($user, $clientData));
        }
        return redirect(route('client.details.edit', compact('client')))->with('success', "Please check your data");


//        $resultDriverLicense = $clientDetailsData->getImageDriverLicense($pathDriverLicense, $nameDriverLicense, $driverLicenseExtension);
//        $resultSocialSecurity = $clientDetailsData->getImageSocialSecurity($pathSocialSecurity, $nameSocialSecurity, $socialSecurityExtension);

//        $user = Arr::only($resultDriverLicense, ['first_name', 'last_name']);
//        $clientData = $resultDriverLicense;
//        $clientData['ssn'] = isset($resultSocialSecurity['ssn']) ? $resultSocialSecurity['ssn'] : '';
//        $clientData["dob"] = isset($clientData['dob']) ? date('Y-m-d', strtotime($clientData['dob'])) : '';
//        $clientData['user_id'] = $client;
//
//
//        $clientAttachmentData = [
//            [
//                'user_id' => $client,
//                'path' => $pathDriverLicense,
//                'file_name' => $nameDriverLicense,
//                'category' => 'DL',
//                'type' => $driverLicenseExtension
//            ],
//            [
//                'user_id' => $client,
//                'path' => $pathSocialSecurity,
//                'file_name' => $nameSocialSecurity,
//                'category' => 'SS',
//                'type' => $socialSecurityExtension
//            ]
//        ];
//
//        if (empty(ClientAttachment::where('user_id', $client)->first())) {
//            ClientAttachment::insert($clientAttachmentData);
//        } elseif (empty(ClientAttachment::where('user_id', $client)->where('category', 'DL')->first())) {
//
//            ClientAttachment::insert($clientAttachmentData[0]);
//            ClientAttachment::where('user_id', $client)->where('category', 'SS')->update($clientAttachmentData[1]);
//        } elseif (empty(ClientAttachment::where('user_id', $client)->where('category', 'SS')->first())) {
//
//            ClientAttachment::insert($clientAttachmentData[1]);
//            ClientAttachment::where('user_id', $client)->where('category', 'DL')->update($clientAttachmentData[0]);
//        } else {
//            ClientAttachment::where('user_id', $client)->where('category', 'DL')->update($clientAttachmentData[0]);
//            ClientAttachment::where('user_id', $client)->where('category', 'SS')->update($clientAttachmentData[1]);
//
//        }
//        $c = Auth::user();
//
//        if(count($resultDriverLicense) != 9 || count($resultSocialSecurity) != 3){
//            $request->session()->put('bad',true);
//        }elseif ($c->clientDetails->registration_steps =='documents') {
//            $c->clientDetails->update(['registration_steps'=>'credentials']);
//        }
//
//        if ($c->clientDetails->registration_steps == 'documents') {
//            $c->clientDetails->update(['registration_steps' => 'credentials']);
//        }
//        $request->session()->put('bad',true);


//        if (empty(ClientDetail::where('user_id', $client)->first())) {
//            User::where('id', $client)->update($user);
//            ClientDetail::create($clientData);
//        } else {
//            UploadClientDetail::insert(array_merge($user, $clientData));
//        }
//        return redirect(route('client.details.edit', compact('client')))->with('success', "Please check your data");
//
    }

    public function updateDriver(Request $request)
    {

        $client = Auth::user()->id;
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

            $path = "files/client/details/image/" . $client . "/";

            $nameDriverLicense = 'driver_license.' . $driverLicenseExtension;

            $pathDriverLicense = '/' . $path . $nameDriverLicense;

            $clientAttachmentDataDL = [

                'user_id' => $client,
                'path' => $pathDriverLicense,
                'file_name' => $nameDriverLicense,
                'category' => 'DL',
                'type' => $driverLicenseExtension

            ];
            $clientAttachment = ClientAttachment::where('user_id', $client)->where('category', 'DL');

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

            $path = "files/client/details/image/" . $client . "/";

            $nameSocialSecurity = 'social_security.' . $socialSecurityExtension;

            $pathSocialSecurity = '/' . $path . $nameSocialSecurity;

            $clientAttachmentDataSS = [

                'user_id' => $client,
                'path' => $pathSocialSecurity,
                'file_name' => $nameSocialSecurity,
                'category' => 'SS',
                'type' => $socialSecurityExtension

            ];
            $clientAttachmentSS = ClientAttachment::where('user_id', $client)->where('category', 'SS');
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




        return redirect()->route('client.details.index');
    }

    public function continue()
    {
        $client = Auth::user();
        ClientDetail::where('user_id', $client->id)->update(['registration_steps' => 'review']);

        $uploadUserDetail = UploadClientDetail::where('user_id', $client->id)->first();
        return redirect(route('client.details.create'));
    }

    public function importantInformation(Request $request)
    {
        $userId = Auth::user()->id;
        if ($request->method() == "GET") {

            $client = User::where('id', $userId)->first();

            $secrets = DB::table('secret_questions')->select('question', 'id')->get();

            return view('client_details.important-information', compact('client', 'secrets'));

        } elseif ($request->method() == "POST") {

            $clientData = $request->except('_token');

            $full_name = explode(" ", $clientData["full_name"]);
            $clientData["first_name"] = array_shift($full_name);
            $clientData["last_name"] = implode(" ", $full_name);
            User::where('id', $userId)->update([
                'first_name' => $clientData["first_name"],
                'last_name' => $clientData["last_name"],
                'secret_questions_id' => $clientData["secret_questions_id"],
                'secret_answer' => $clientData["secret_answer"]

            ]);

            ClientDetail::where('user_id', $userId)->update([
                'phone_number' => $clientData["phone_number"],
                'sex' => $clientData["sex"],
                'registration_steps' => 'documents'
            ]);

            return redirect()->to('/client/registration-steps');
        }
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

        return view('client_details.report', compact('clientReportsEX','clientReportsTU', 'clientReportsEQ',
            'equifaxDate','experianDate','transunionDate'));
    }

    public function negativeItem()
    {
        $client = Auth::user();
        $clientReportsTU = ClientReport::where('user_id', $client->id)->where('type', "TU_DIS")->first();
        $clientReportsEX = ClientReport::where('user_id', $client->id)->where('type', "EX_LOG")->first();
        $clientReportsEQ = ClientReport::where('user_id', $client->id)->where('type', "EQ")->first();
        return view('client_details.view_negative_item', compact('clientReportsEX', 'clientReportsTU', 'clientReportsEQ'));
    }

    public function negativeItemStore(Request $request)
    {
        $dispute = $request->except('_token');
        $userId = Auth::user()->id;
        $disputeName = [];
        $disputeEmployer = [];
        $disputeAddress = [];
        $disputePhone = [];
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

            if ($key == 'ex_name' or $key == 'tu_name' or $key == 'eq_name') {

                foreach ($value as $dispute_name) {
                    $name = ClientReportName::where('id', $dispute_name)->first();
                    $disputeName[] = $name;
                }
            }

            if ($key == 'ex_employ' or $key == 'tu_employ' or $key == 'eq_employ') {

                foreach ($value as $dispute_name) {
                    $name = ClientReportEmployer::where('id', $dispute_name)->first();
                    $disputeEmployer[] = $name;
                }
            }

            if ($key == 'ex_address' or $key == 'tu_address' or $key == 'eq_address') {
                foreach ($value as $disputeAddresses) {
                    $address = ClientReportAddress::where('id', $disputeAddresses)->first();
                    $disputeAddress[] = $address;
                }
            }

            if ($key == 'ex_phone' or $key == 'tu_phone') {
                foreach ($value as $disputePhones) {
                    $phone = ClientReportPhone::where('id', $disputePhones)->first();
                    $disputePhone[] = $phone;
                }
            }

            if ($key == 'ex_public') {
                foreach ($value as $disputeExPublicRecords) {
                    $exPublic = ClientReportExPublicRecord::where('id', $disputeExPublicRecords)->first();
                    $disputeExPublicRecord[] = $exPublic;
                }
            }

            if ($key == 'ex_accounts') {
                foreach ($value as $disputeExAccounts) {
                    $exAccount = ClientReportExAccount::where('id', $disputeExAccounts)->first();
                    $disputeExAccount[] = $exAccount;
                }
            }

            if ($key == 'ex_inquiry') {
                foreach ($value as $disputeExInquiries) {
                    $exInquiry = ClientReportExInquiry::where('id', $disputeExInquiries)->first();
                    $disputeExInquiry[] = $exInquiry;
                }
            }

            if ($key == 'ex_statement') {
                foreach ($value as $disputeExStatements) {
                    $exStatement = ClientReportExStatement::where('id', $disputeExStatements)->first();
                    $disputeExStatement[] = $exStatement;
                }
            }

            if ($key == 'tu_public') {
                foreach ($value as $disputeTuPublicRecords) {
                    $tuPublic = ClientReportTuPublicRecord::where('id', $disputeTuPublicRecords)->first();
                    $disputeTuPublicRecord[] = $tuPublic;
                }
            }

            if ($key == 'tu_account') {
                foreach ($value as $disputeTuAccounts) {
                    $tuAccount = ClientReportTuAccount::where('id', $disputeTuAccounts)->first();
                    $disputeTuAccount[] = $tuAccount;
                }
            }

            if ($key == 'tu_inquiry') {
                foreach ($value as $disputeTuInquiries) {
                    $tuInquiry = ClientReportTuInquiry::where('id', $disputeTuInquiries)->first();
                    $disputeTuInquiry[] = $tuInquiry;
                }
            }

            if ($key == 'tu_statement') {
                foreach ($value as $disputeTuStatements) {
                    $tuStatement = ClientReportTuStatement::where('id', $disputeTuStatements)->first();
                    $disputeTuStatement[] = $tuStatement;
                }
            }

            if ($key == 'eq_public') {
                foreach ($value as $disputeEqPublicRecords) {

                    $tuPublic = ClientReportEqPublicRecord::where('id', $disputeEqPublicRecords)->first();
                    $disputeEqPublicRecord[] = $tuPublic;
                }
            }

            if ($key == 'eq_account') {
                foreach ($value as $disputeEqAccounts) {
                    $tuAccount = ClientReportEqAccount:: where('id', $disputeEqAccounts)->first();
                    $disputeEqAccount[] = $tuAccount;
                }
            }

            if ($key == 'eq_inquiry') {
                foreach ($value as $disputeEqInquiries) {
                    $tuInquiry = ClientReportEqInquiry::where('id', $disputeEqInquiries)->first();
                    $disputeEqInquiry[] = $tuInquiry;
                }
            }

        }


        $data = [
            'name' => $disputeName,
            'employ' => $disputeEmployer,
            'address' => $disputeAddress,
            'phone' => $disputePhone,
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

        return view('client_details.view_negative_show', compact('data'));
    }

    public function negativeItemContract(Request $request)
    {
        $dispute = $request->except('_token');
        $clientId = Auth::user()->id;
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
                $todoExAccount = $this->saveToDo($clientId, $user->id, "Experian Account", "",0);
                foreach ($value as $disputeExAccounts) {
                    $this->saveDisputableAdditional($todoExAccount, "App\\ClientReportExAccount",  $disputeExAccounts,0);
                }
                $checkToDo = Disputable::where('todo_id', $todoExAccount)->count('id');
                if( is_null($checkToDo)){
                    Todo::where('id', $todoExAccount)->delete();
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
            return redirect()->route('client.details.index');

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

    public function uploadCreditReports()
    {
        return view('client_details.upload-credit-reports');
    }

    public function uploadPdf(Request $request, ReadPdfData $readPdfData, CreditReportUpload $creditReportUpload)
    {

        if (empty($request->file())) {
            return redirect('/client/details/upload-credit-reports')->with('error', 'Please upload files');
        }
        $validationUploadPdf = $creditReportUpload->validate($request['credit_report']);

        if ($validationUploadPdf[0] == 'error') {
            return redirect('/client/details/upload-credit-reports')->with('error', $validationUploadPdf[1]);
        }

        $userId = Auth::user()->id;

        $moveUploadFile = $creditReportUpload->moveUploadFile($userId, $request['credit_report'], $validationUploadPdf[1]);

//        @Todo: get data from second transunion pdf file
//        @Todo: CreditKarma payment history
        $clientReports = [];
        if (count($moveUploadFile) > 1) {
            $clientReports = $readPdfData->getTransUnionAccountDetailsData($moveUploadFile['attachments'][0]);
            $dataTUPH = $readPdfData->getTransUnionPaymentHistoryData($moveUploadFile['attachments'][1]);
            // Merge Payment History to Client Reports Data
            foreach ($clientReports as $key => &$clientReport) {
                $clientReport = array_merge($clientReport, $dataTUPH[$key]);
            }
        } else {
            switch ($moveUploadFile['attachments'][0]->category) {
                case "CK TU":
                    $clientReports = $readPdfData->getCreditKarmaData($moveUploadFile['attachments'][0]);
                    break;
                case "CK EF":
                    $clientReports = $readPdfData->getCreditKarmaData($moveUploadFile['attachments'][0]);
                    break;
                case "EX":
                    $clientReports = $readPdfData->getExprianData($moveUploadFile['attachments'][0]);
                    break;
                default:
                    return redirect('/client/details/upload-credit-reports')->with('error', "Error message: case when file is not known");
                    break;
            }
        }
        ClientReports::insert($clientReports);

        return redirect(route('client.details.index'))->with('success', "Your report uploaded");

    }



}

