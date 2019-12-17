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

        $resultDriverLicense = $clientDetailsData->getImageDriverLicense($pathDriverLicense, $nameDriverLicense);
        $resultSocialSecurity = $clientDetailsData->getImageSocialSecurity($pathSocialSecurity, $nameSocialSecurity);


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



//+        // Todo: Client can have more than one attachment
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
            return redirect(route('client.details.edit', compact('client')))->with('success', "your data saved");


        }
    }

    public function show()
    {


    }

    // Process Driver license
    // change image to black&withe
    // get data(DOB, Address, SEX)
    // remove draft image
    // return data
    private function processDL($path)
    {
        $response = [];
        //make draft path if not exists
        if (!is_dir(public_path() . '/' . $path . '/draft')) {
            mkdir( public_path() . '/' . $path . '/draft', 0777);
        }
        $draft_path = public_path() . '/' . $path . '/draft/driver_license.jpeg';
        $image = \Image::make(public_path() . '/' . $path . 'driver_license.jpeg')
//            ->blur(2)
//            ->sharpen()
            ->greyscale()
            ->brightness(15);
        $image->save($draft_path);

//        $data = \OCR::scan( public_path() . '/' . $path. 'driver_license.jpeg');
        $data = \OCR::scan( $draft_path);
        // remove draft file
        preg_match("/(dob|bos|pos|cow|von|noe)+(| )([0-9]{2}\/[0-9]{2}\/[0-9]{4})/im", $data, $dob);
        preg_match("/(sex|sec|sex.)+(| |i)(m|f)/im", $data, $sex);
        preg_match("/(^[0-9]{1,}+[0-9a-zA-Z\s,.%;:]+([0-9]{4,5}+(-+[0-9]{4}|)))/im", $data, $address);
        if (isset($dob[3])) {
            $response['dob'] =  $dob[3];
        }
        if (isset($sex[3])) {
            $response['sex'] =  $sex[3];
        }
        if (isset($address[0])) {
            // Get state
            preg_match_all('/[A-Z]{2}/m', $address[0], $match);
            $response["state"] = $match[0][count($match[0])-1];
            // Get zip code
            $zip = explode($response['state'], $address[0]);
            $response["zip"] = $zip[count($zip)-1];
            // Get City and Address
            preg_match_all('/[^\n]+/m', $address[0], $match);
            $response['city'] = !empty($match[0][1]) ? str_replace([$response["state"], $response["zip"]], '' , $match[0][1] ): null;
            $response['address'] = !empty($match[0][0]) ? $match[0][0] : $address[0];
        }
        return $response;
    }

    // Process Driver license
    // change image to black&withe
    // get data(SSN, FullName)
    // remove draft image
    // return data
    private function processSS($path)
    {
        $response = [];

        //make draft path if not exists
        if (!is_dir(public_path() . '/' . $path . '/draft')) {
            mkdir( public_path() . '/' . $path . '/draft', 0777);
        }

        $draft_path = public_path() . '/' . $path . '/draft/social_security.jpeg';

        $image = \Image::make(public_path() . '/' . $path . 'social_security.jpeg')
            ->greyscale()
            ->brightness(15)
            ->contrast(32)
            ->blur(1.5);
        $image->save($draft_path);

        $data = \OCR::scan($draft_path);
        // remove draft file
        preg_match("/[0-9]{3}.([0-9]{2}).[0-9]{4}/im", $data, $ssn);
        preg_match("/(^(.{1,3}\s|))+([A-Z]{1,}\s([A-Z]{1,}|.|)+(\s[A-Z]{1,}|\r\[A-Z]{1,}|))/m", $data, $name);
        if (isset($ssn[0])) {
            $response['ssn'] = $ssn[0];
        }

        if (isset($name[0])) {
            $full_name = explode(' ', $name[0]);
            $response['first_name'] = $full_name[0];
            $response['last_name'] = count($full_name) > 2 ? $full_name[2] : $full_name[1];
        }
        return $response;

    }


    public function uploadPdf(Request $request, ReadPdfData $readPdfData)
    {

        $userId = Auth::user()->id;
        if (empty($request['credit_report']) ) {
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

        return view('client_details.create-credentials');
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

    public function credentialsEdit()
    {
        $userId = Auth::user()->id;
        $credential = Credential::where('user_id', $userId)->first();
        return view('client_details.edit-credentials', compact( 'credential'));
    }

    public function credentialsUpdate(Request $request)
    {
        $userId = Auth::user()->id;
        $data = $request['client'];
        $data['user_id'] = $userId;
        Credential::where('user_id', $userId)->update($data);
        return redirect('client/details');
    }



}
