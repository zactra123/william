<?php

namespace App\Http\Controllers;

use App\Services\ReadPdfData;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Auth;
use App\User;
use App\ClientDetail;
use Illuminate\Support\Facades\Validator;
use App\Services\ClientDetailsData;
use App\Services\CreditReportUpload;
use App\ClientAttachment;
use App\Credential;
use App\UploadClientDetail;

class ClientDetailsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
        $this->middleware('client', ['except' => 'store']);

    }

    public function index()
    {
        return view('client_details.index');
    }

    public function create()
    {

        return view('client_details.create');

    }
    public function store(Request $request)
    {
        $data = $request->client;
        $validation = Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'dob' => ['required'],
            'sex'=> ['required'],
            'ssn'=> ['required', 'string', 'max:255'],
            'state'=> ['required', 'string', 'max:255'],
            'city'=> ['required', 'string', 'max:255'],
            'address'=> ['required', 'string', 'max:255'],
            'zip'=> ['required', 'string', 'max:255'],
            'phone_number'=> ['required', 'string', 'max:255'],
        ]);


        if ($validation->fails()) {

            return view('client_details.create')->withErrors($validation);
        } else {


            $id = Auth::user()->id;
            $user = Arr::only($request->client, ['first_name', 'last_name']);
            $clientDetails = Arr::except($request->client, ['first_name', 'last_name']);
            $clientDetails["user_id"] = $id;

            User::where('id', $id)->update($user);

            if(empty(ClientDetail::where('user_id',$id )->first())){
                ClientDetail::create($clientDetails);
            }else{
                ClientDetail::where('user_id',$id)->update($clientDetails);
            }


            return redirect(route('client.details.index'))->with('success', "your data saved");
        }
    }

    public function edit($id, Request $request)
    {
        $user = Auth::user();
        $uploadUserDetail = UploadClientDetail::where('user_id',$user->id )->first();
        if (!empty($uploadUserDetail)) {
            return view('client_details.edit_with_upload_data', compact('user', 'uploadUserDetail'));
        }
        return view('client_details.edit', compact('user'));
    }

    public function update(Request $request)
    {

        $data = $request->client;
        $data["sex"] = isset($data["sex"]) ? $data["sex"] : $data["sex_uploaded"];
        $id = Auth::user()->id;
        $uploaded = UploadClientDetail::where("user_id", $id);


        $validation = Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'dob' => ['required'],
            'sex'=> ['required'],
            'ssn'=> ['required', 'string', 'max:255'],
            'state'=> ['required', 'string', 'max:255'],
            'city'=> ['required', 'string', 'max:255'],
            'address'=> ['required', 'string', 'max:255'],
            'zip'=> ['required', 'string', 'max:255'],
            'phone_number'=> ['required', 'string', 'max:255'],
        ]);


        if ($validation->fails()) {
            if(!empty($uploaded)) {
                return view('client_details.edit_with_upload_data')->withErrors($validation);
            }
            return view('client_details.create')->withErrors($validation);
        } else {


            $user = Arr::only($request->client, ['first_name', 'last_name']);
            $clientDetails = Arr::except($request->client, ['first_name', 'last_name', 'sex_uploaded']);

            User::where('id', $id)->update($user);

            $d = ClientDetail::where('user_id', $id)->update($clientDetails);

            $uploaded->delete();
            $client = $id;
            return redirect(route('client.details.index'))->with('success', "your data saved");


        }
    }



    public function credentials()
    {
        $userId = Auth::user()->id;
        $credential = Credential::where('user_id', $userId)->first();
        return view('client_details.create-credentials', compact( 'credential'));
    }

    public function credentialsStore(Request $request)
    {
        $userId = Auth::user()->id;
        $data = $request['client'];
        $data['user_id'] = $userId;

        if(empty(Credential::where('user_id', $userId)->first())){
            Credential::create($data);
        }else{
            Credential::where('user_id', $userId)->update($data);
        }

        return redirect('client/details');
    }

    public function addDlSs()
    {
        return view('client_details.upload-dl-ss');
    }
    //create or update for client details



    public function storeDlSs(Request $request, ClientDetailsData $clientDetailsData)
    {

        $client = Auth::user()->id;
        if (empty($request['driver_license']) || empty($request['social_security'])) {
            return redirect()->back()
                ->withInput()
                ->with('error','Please upload both files');
        }


        $imagesDriverLicense = $request->file("driver_license");
        $imagesSocialSecurity = $request->file("social_security");


        $imageExtension = ['pdf', 'gif', 'png', 'jpg', 'jpeg', 'tif', 'bmp'];
        $driverLicenseExtension = strtolower($imagesDriverLicense->getClientOriginalExtension());
        $socialSecurityExtension = strtolower($imagesSocialSecurity->getClientOriginalExtension());

        if(!in_array($driverLicenseExtension, $imageExtension)|| !in_array($socialSecurityExtension, $imageExtension)){
            return redirect('client/details/create ')->with('error','Please upload the correct file format (PDF, GIF, PNG, JPG, TIF, BMP)');
        }

        $path = "files/client/details/image/". $client."/";

        $nameDriverLicense = 'driver_license.'.$driverLicenseExtension;
        $nameSocialSecurity ='social_security.'.$socialSecurityExtension;

        $imagesDriverLicense->move(public_path() . '/' . $path, $nameDriverLicense);
        $imagesSocialSecurity->move(public_path() . '/' . $path, $nameSocialSecurity);

        $pathDriverLicense = public_path() . '/' . $path . '/'. $nameDriverLicense;
        $pathSocialSecurity = public_path() . '/' . $path . '/'. $nameSocialSecurity;

        $resultDriverLicense = $clientDetailsData->getImageDriverLicense($pathDriverLicense, $nameDriverLicense, $driverLicenseExtension);
        $resultSocialSecurity = $clientDetailsData->getImageSocialSecurity($pathSocialSecurity, $nameSocialSecurity,$socialSecurityExtension);

//        dd($imagesDriverLicense, '123',$imagesSocialSecurity);

        $user = Arr::only($resultSocialSecurity,  ['first_name', 'last_name']);
        $clientData =  $resultDriverLicense;
        $clientData['ssn'] = isset($resultSocialSecurity['ssn']) ? $resultSocialSecurity['ssn'] : '';
        $clientData["dob"] = isset($clientData['dob']) ? date('Y-m-d',strtotime($clientData['dob'])) : '';
        $clientData['user_id'] = $client;



        $clientAttachmentData = [
            [
                'user_id'=> $client,
                'path'=>$pathDriverLicense,
                'file_name'=> $nameDriverLicense,
                'category' =>'DL',
                'type'=>$driverLicenseExtension
            ],
            [
                'user_id'=>$client,
                'path'=>$pathSocialSecurity,
                'file_name'=> $nameSocialSecurity,
                'category'=>'SS',
                'type'=>$socialSecurityExtension
            ]
        ];

        if(empty(ClientAttachment::where('user_id',$client )->first())){
            ClientAttachment::insert($clientAttachmentData);
        }elseif(empty(ClientAttachment::where('user_id',$client )->where('category', 'DL')->first())){

            ClientAttachment::insert($clientAttachmentData[0]);
            ClientAttachment::where('user_id',$client)->where('category', 'SS')->update($clientAttachmentData[1]);
        }elseif(empty(ClientAttachment::where('user_id',$client )->where('category', 'SS')->first())){

            ClientAttachment::insert($clientAttachmentData[1]);
            ClientAttachment::where('user_id',$client)->where('category', 'DL')->update($clientAttachmentData[0]);
        }else{
            ClientAttachment::where('user_id',$client)->where('category', 'DL')->update($clientAttachmentData[0]);
            ClientAttachment::where('user_id',$client)->where('category', 'SS')->update($clientAttachmentData[1]);

        }

        if(empty(ClientDetail::where('user_id',$client )->first())){
            User::where('id', $client)->update($user);
            ClientDetail::create($clientData);
        }else{
            UploadClientDetail::insert(array_merge($user, $clientData));
            return redirect(route('client.details.edit', compact('client')));
        }

//        @Todo: fix redirection
//        if(count($resultDriverLicense) != 6 || count($resultSocialSecurity) != 3){
//            $request->session()->put('bad',true);
//            return redirect('client/details/create ')->with('error','Please upload images more clearly');
//        }


        return redirect(route('client.details.edit', compact('client')))->with('success', "Please check your data");

    }



    public function uploadCreditReports()
    {
        return view('client_details.upload-credit-reports');
    }

    public function uploadPdf(Request $request, ReadPdfData $readPdfData, CreditReportUpload $creditReportUpload)
    {

        if (empty($request->file())) {
            return redirect('/client/details/upload-credit-reports')->with('error','Please upload files');
        }

        $validationUploadPdf = $creditReportUpload->validate($request['credit_report']);

        if($validationUploadPdf[0] == 'error'){
            return redirect('/client/details/upload-credit-reports')->with('error', $validationUploadPdf[1]);
        }

        $userId = Auth::user()->id;

        $moveUploadFile = $creditReportUpload->moveUploadFile($userId,$request['credit_report'], $validationUploadPdf[1]);

//        @Todo: get data from second transunion pdf file
//        @Todo: CreditKarma payment history

        $clientReports = [];
        if (count($moveUploadFile) > 1) {
            $clientReports = $readPdfData->getTransUnionAccountDetailsData($moveUploadFile[0]);
            $dataTUPH = $readPdfData->getTransUnionPaymentHistoryData($moveUploadFile[1]);
            // Merge Payment History to Client Reports Data
            foreach($clientReports as $key => &$clientReport){
                $clientReport = array_merge($clientReport, $dataTUPH[$key]);
            }
        } else{
            switch ($moveUploadFile[0]->category){
                case "CK TU":
                    $clientReports = $readPdfData->getCreditKarmaData($moveUploadFile[0]);
                    break;
                case "CK EF":
                    $clientReports = $readPdfData->getCreditKarmaData($moveUploadFile[0]);
                    break;
                case "EX":
                    $clientReports = $readPdfData->getExprianData($moveUploadFile[0]);
                    break;
                default:
                    return redirect('/client/details/upload-credit-reports')->with('error',"Error message: case when file is not known");
                    break;
            }
        }
        dd($clientReport);
        ClientReports::insert($clientReports);

        return redirect(route('client.details.index'))->with('success', "Your report uploaded");

    }

}
