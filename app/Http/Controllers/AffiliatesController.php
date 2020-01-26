<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        return view('affiliate.create-client');
    }

    public function storeClient(Request $request)
    {

        $email = ['email'=>$request->email];

        $validation =  Validator::make($email, [

            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],

        ]);

        if ($validation->fails()){
            return redirect()->back()
                ->withInput()
                ->withErrors($validation);
        }

        $affiliateId = Auth::user()->id;

        $user = User::create([
            'email'=> $request->email,
        ]);

        $userId = $user->id;

        Affiliate::create([
            'affiliate_id' =>$affiliateId,
                'user_id' => $userId,
        ]);

        $user->sendEmailVerificationNotification();

        return view('affiliate.create-client');

    }

    public function addClientDetails($client)
    {

        return view('affiliate.create-client-detail', compact('client'));

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


            if(empty(ClientDetail::where('user_id',$clientId->id )->first())){
                ClientDetail::create($clientDetails);
                User::where('id', $clientId->id)->update($user);
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

            User::where('id', $id)->update($user);

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


    public function storeDLSS(Request $request,ClientDetailsData $clientDetailsData, $id)
    {
        $client = Affiliate::where('id', $id)->first();

        $clientId = $client->user_id;

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
            return redirect()->back()
                ->withInput()
                ->with('error','Please upload the correct file format (PDF, GIF, PNG, JPG, TIF, BMP)');
        }

        $path = "files/client/details/image/". $clientId."/";

        $nameDriverLicense = 'driver_license.'.$driverLicenseExtension;
        $nameSocialSecurity ='social_security.'.$socialSecurityExtension;

        $imagesDriverLicense->move(public_path() . '/' . $path, $nameDriverLicense);
        $imagesSocialSecurity->move(public_path() . '/' . $path, $nameSocialSecurity);

        $pathDriverLicense = public_path() . '/' . $path . '/'. $nameDriverLicense;
        $pathSocialSecurity = public_path() . '/' . $path . '/'. $nameSocialSecurity;

        $resultDriverLicense = $clientDetailsData->getImageDriverLicense($pathDriverLicense, $nameDriverLicense, $driverLicenseExtension);
        $resultSocialSecurity = $clientDetailsData->getImageSocialSecurity($pathSocialSecurity, $nameSocialSecurity,$socialSecurityExtension);


        $user = Arr::only($resultSocialSecurity,  ['first_name', 'last_name']);
        $clientData =  $resultDriverLicense;
        $clientData['ssn'] = isset($resultSocialSecurity['ssn']) ? $resultSocialSecurity['ssn'] : '';

        $clientData["dob"] = isset($clientData['dob']) ? date('Y-m-d',strtotime($clientData['dob'])) : '';
        $clientData['user_id'] = $clientId;


        $clientAttachmentData = [
            [
                'user_id'=> $clientId,
                'path'=>$pathDriverLicense,
                'file_name'=> $nameDriverLicense,
                'category' =>'DL',
                'type'=>$driverLicenseExtension
            ],
            [
                'user_id'=>$clientId,
                'path'=>$pathSocialSecurity,
                'file_name'=> $nameSocialSecurity,
                'category'=>'SS',
                'type'=>$socialSecurityExtension
            ]
        ];


        if(empty(ClientAttachment::where('user_id',$clientId )->first())){
            ClientAttachment::insert($clientAttachmentData);
        }elseif(empty(ClientAttachment::where('user_id',$clientId )->where('category', 'DL')->first())){

            ClientAttachment::insert($clientAttachmentData[0]);
            ClientAttachment::where('user_id',$clientId)->where('category', 'SS')->update($clientAttachmentData[1]);
        }elseif(empty(ClientAttachment::where('user_id',$clientId )->where('category', 'SS')->first())){

            ClientAttachment::insert($clientAttachmentData[1]);
            ClientAttachment::where('user_id',$clientId)->where('category', 'DL')->update($clientAttachmentData[0]);
        }else{
            ClientAttachment::where('user_id',$clientId)->where('category', 'DL')->update($clientAttachmentData[0]);
            ClientAttachment::where('user_id',$clientId)->where('category', 'SS')->update($clientAttachmentData[1]);

        }


        if(empty(ClientDetail::where('user_id', $clientId)->first())){
            User::where('id', $clientId)->update($user);
            ClientDetail::create($clientData);
        }else{
            $affiliate =$id;

            UploadClientDetail::insert(array_merge($user, $clientData));
            return redirect(route('affiliate.editClientDetails', compact('affiliate')));
        }


//        if(count($resultDriverLicense) != 6 || count($resultSocialSecurity) != 3){
//            $request->session()->put('bad',true);
//            return redirect()->back()
//                ->withInput()
//                ->with('error','Please upload images more clearly');
//        }
        $affiliate = $id;
        return redirect(route('affiliate.editClientDetails', compact('affiliate')))->with('success', "Please check your client data");

    }





}
