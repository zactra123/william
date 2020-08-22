<?php

namespace App\Http\Controllers;

use App\ClientReport;
use App\Services\Escrow;
use App\Services\ReadPdfData;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Auth;
use App\User;
use App\ClientDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Services\ClientDetailsData;
use App\Services\CreditReportUpload;
use App\ClientAttachment;
use App\Credential;
use App\UploadClientDetail;
use App\Services\Screaper;

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
        return view('client_details.index', compact('client'));
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
            'dob' => ['required'],
            'sex' => ['required'],
            'ssn' => ['required', 'string', 'max:255'],
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
            if (isset($fullAddress[2])) {
                preg_match('/[A-Z]{2}/m', $fullAddress[2], $match);
                $state = isset($match[0]) ? $match[0] : null;
                $zip = str_replace([$state, ' '], '', $fullAddress[2]);
            }

            $client_details = ClientDetail::where('user_id', $id)->first();
            $registration_steps = $client_details->registration_steps;

            preg_match("/([0-9]{1,})/im", $fullAddress[0], $number);
            $clientDetails ["number"] = $number[0];
            $clientDetails['name'] = trim(str_replace($number[0], '', $fullAddress[0]));
            $clientDetails['city'] = isset($fullAddress[1]) ? trim($fullAddress[1]) : null;
            $clientDetails['state'] = isset($state) ? $state : null;
            $clientDetails['zip'] = isset($zip) ? $zip : null;
            $clientDetails['address'] = strtoupper($data['address']);
            $clientDetails['registration_steps'] = "finished";

            User::where('id', $id)->update([
                'first_name' => strtoupper($user['first_name']),
                'last_name' => strtoupper($user['last_name'])
            ]);
            $client_details->update($clientDetails);
            $uploaded->delete();
            if ($registration_steps == 'review') {
                return redirect(route('client.details.create'));
            }
            return redirect(route('client.details.index'))->with('success', "your data saved");

        }
    }

    public function credentials()
    {
        $client = Auth::user();
        return view('client_details.create-credentials', compact('client'));
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

    public function storeDlSs(Request $request, ClientDetailsData $clientDetailsData)
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

        $pathDriverLicense = public_path() . '/' . $path . $nameDriverLicense;
        $pathSocialSecurity = public_path() . '/' . $path . $nameSocialSecurity;


        $resultDriverLicense = $clientDetailsData->getImageDriverLicense($pathDriverLicense, $nameDriverLicense, $driverLicenseExtension);
        $resultSocialSecurity = $clientDetailsData->getImageSocialSecurity($pathSocialSecurity, $nameSocialSecurity, $socialSecurityExtension);

        $user = Arr::only($resultSocialSecurity, ['first_name', 'last_name']);
        $clientData = $resultDriverLicense;
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
                'sex' => $clientData["sex"]
            ]);

            return redirect()->to('/client/registration-steps');
        }
    }

    public function negativeItem()
    {

        $clientReportsTU = ClientReport::where('user_id',2)->where('type', "TU_DIS")->first();
        $clientReportsEX = ClientReport::where('user_id',2)->where('type', "EX_LOG")->first();

//        dd($clientReportsEX);


        return view('client_details.view_negative_item', compact('clientReportsEX','clientReportsTU'));
    }
    public function negativeItemStore(Request $request)
    {
        dd($request->all());
    }

}
