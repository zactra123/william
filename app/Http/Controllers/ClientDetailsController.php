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
use App\ClientAttachment;
use App\Credential;


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

    //create or update for client details
    public function store(Request $request, ClientDetailsData $clientDetailsData)
    {
        $userId = Auth::user()->id;
        if (empty($request['driver_license']) || empty($request['social_security'])) {
       return redirect('client/details/create ')->with('error','Please upload both files');
        }


        $imagesDriverLicense = $request->file("driver_license");
        $imagesSocialSecurity = $request->file("social_security");


        $imageExtension = ['pdf', 'gif', 'png', 'jpg', 'jpeg', 'tif', 'bmp'];
        $driverLicenseExtension = strtolower($imagesDriverLicense->getClientOriginalExtension());
        $socialSecurityExtension = strtolower($imagesSocialSecurity->getClientOriginalExtension());

        if(!in_array($driverLicenseExtension, $imageExtension)|| !in_array($socialSecurityExtension, $imageExtension)){
            return redirect('client/details/create ')->with('error','Please upload the correct file format (PDF, GIF, PNG, JPG, TIF, BMP)');
        }

        $path = "files/client/details/image/". $userId."/";

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
        User::where('id', $userId)->update($user);
        $clientData["dob"] = isset($clientData['dob']) ? date('Y-m-d',strtotime($clientData['dob'])) : '';
        $clientData['user_id'] = $userId;


        $clientAttachmentData = [
            [
                'user_id'=> $userId,
                'path'=>$pathDriverLicense,
                'file_name'=> $nameDriverLicense,
                'category' =>'DL',
                'type'=>$driverLicenseExtension
            ],
            [
                'user_id'=>$userId,
                'path'=>$pathSocialSecurity,
                'file_name'=> $nameSocialSecurity,
                'category'=>'SS',
                'type'=>$socialSecurityExtension
            ]
        ];

//
//        ClientAttachment::insert($clientAttachmentData);
        if(empty(ClientAttachment::where('user_id',$userId )->first())){
            ClientAttachment::insert($clientAttachmentData);
        }elseif(empty(ClientAttachment::where('user_id',$userId )->where('category', 'DL')->first())){

            ClientAttachment::insert($clientAttachmentData[0]);
            ClientAttachment::where('user_id',$userId)->where('category', 'SS')->update($clientAttachmentData[1]);
        }elseif(empty(ClientAttachment::where('user_id',$userId )->where('category', 'SS')->first())){

            ClientAttachment::insert($clientAttachmentData[1]);
            ClientAttachment::where('user_id',$userId)->where('category', 'DL')->update($clientAttachmentData[0]);
        }else{
            ClientAttachment::where('user_id',$userId)->where('category', 'DL')->update($clientAttachmentData[0]);
            ClientAttachment::where('user_id',$userId)->where('category', 'SS')->update($clientAttachmentData[1]);

        }

        if(empty(ClientDetail::where('user_id',$userId )->first())){
            ClientDetail::create($clientData);
        }else{
            ClientDetail::where('user_id',$userId)->update($clientData);
        }


        if(count($resultDriverLicense) != 6 || count($resultSocialSecurity) != 3){
            $request->session()->put('bad',true);
            return redirect('client/details/create ')->with('error','Please upload images more clearly');
        }
        $client = $userId;
        return redirect(route('client.details.edit', compact('client')))->with('success', "Please check your data");

    }

    public function edit($id)
    {
        $user = Auth::user();

        return view('client_details.edit', compact('user'));
    }

    public function update(Request $request)
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
        ]);


        if ($validation->fails()) {

            return view('client_details.create')->withErrors($validation);
        } else {


            $id = Auth::user()->id;
            $user = Arr::only($request->client, ['first_name', 'last_name']);
            $clientDetails = Arr::except($request->client, ['first_name', 'last_name']);

            User::where('id', $id)->update($user);

            ClientDetail::where('id', $id)->update($clientDetails);
            $client = $id;
            return redirect(route('client.details.index'))->with('success', "your data saved");


        }
    }

    public function show()
    {


    }

    public function uploadCreditReports()
    {
        return view('client_details.upload-credit-reports');
    }

    public function uploadPdf(Request $request, ReadPdfData $readPdfData)
    {

        $userId = Auth::user()->id;
        if (empty($request['credit_report']) ) {
            return redirect('client/details')->with('error','Please upload files');
        }elseif( $request->file("credit_report")->getClientOriginalExtension() != 'pdf'){
            return redirect('client/details')->with('error','Please upload files');
        }

        $pdfCreditReport = $request->file("credit_report");

        $nameCreditReport = date('YmdHis') .'_'.$pdfCreditReport->getClientOriginalName();

        $path = 'files/client/details/image/'. $userId.'/creditReport';
        $fileType = $pdfCreditReport->getClientOriginalExtension();
        $pathCreditReport = public_path() . '/' . $path . '/'. $nameCreditReport;
        $pdfCreditReport->move(public_path() . '/' . $path, $nameCreditReport);

        $getCreditCompanyName = $readPdfData->getCreditCompanyName($pathCreditReport);


        if($getCreditCompanyName == null){
            return redirect('client/details')->with('error','Please upload files');
        }

        $clientAttachmentData = [
            'user_id'=>$userId,
            'path'=>$pathCreditReport,
            'file_name'=> $nameCreditReport,
            'category' =>$getCreditCompanyName,
            'type'=>$fileType
        ];

        $attachmentId = ClientAttachment::create($clientAttachmentData)->id;

        if($getCreditCompanyName == 'CK TU'){
            $dataCK = $readPdfData->getCreditKarmaData($pathCreditReport, $userId, $attachmentId);
        }elseif($getCreditCompanyName == 'CK EF'){
            $dataCK = $readPdfData->getCreditKarmaData($pathCreditReport, $userId, $attachmentId);
        }elseif($getCreditCompanyName == 'EX'){
            $dataEX = $readPdfData->getExprianData($pathCreditReport, $userId, $attachmentId);
        }elseif($getCreditCompanyName =='TU AD'){
            $dataTUAD = $readPdfData->getTransUnionAccountDetailsData($pathCreditReport, $userId, $attachmentId);
        }else{
            $dataTUPH = $readPdfData->getTransUnionPaymentHistoryData($pathCreditReport, $userId, $attachmentId);
        }

        dd('dasdasd');


        $clientAttachmentData = [
             'user_id'=>$userId,
             'path'=>$pathCreditReport,
             'file_name'=> $nameCreditReport,
             'category' =>$getCreditCompanyName,
             'type'=>$fileType
        ];

        ClientAttachment::create($clientAttachmentData);

        return redirect(route('client.details.index'))->with('success', "Your report uploaded");

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

}
