<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\User;
use App\Affiliate;
use Auth;
use App\ClientAttachment;




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

        $user =   User::create([

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

        $clientId = $client;
        return view('affiliate.create-client-detail', compact('clientId'));
    }

    public function storeClientDetails(Request $request, $id)
    {

        $client = Affiliate::where('id', $id)->first();

        $clientId = $client->id;


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

        $path = "files/client/details/image/". $clientId."/";

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
        if(empty(ClientAttachment::where('user_id',$clientId )->first())){
            ClientAttachment::insert($clientAttachmentData);
        }elseif(empty(ClientAttachment::where('user_id',$clientId )->where('category', 'DL')->first())){

            ClientAttachment::insert($clientAttachmentData[0]);
            ClientAttachment::where('user_id',$userId)->where('category', 'SS')->update($clientAttachmentData[1]);
        }elseif(empty(ClientAttachment::where('user_id',$clientId )->where('category', 'SS')->first())){

            ClientAttachment::insert($clientAttachmentData[1]);
            ClientAttachment::where('user_id',$clientId)->where('category', 'DL')->update($clientAttachmentData[0]);
        }else{
            ClientAttachment::where('user_id',$clientId)->where('category', 'DL')->update($clientAttachmentData[0]);
            ClientAttachment::where('user_id',$clientId)->where('category', 'SS')->update($clientAttachmentData[1]);

        }

        if(empty(ClientDetail::where('user_id',$clientId )->first())){
            ClientDetail::create($clientData);
        }else{
            ClientDetail::where('user_id',$clientId)->update($clientData);
        }


        if(count($resultDriverLicense) != 6 || count($resultSocialSecurity) != 3){
            $request->session()->put('bad',true);
            return redirect('client/details/create ')->with('error','Please upload images more clearly');
        }
        $client = $clientId;
        return redirect(route('client.details.edit', compact('client')))->with('success', "Please check your data");

    }

    public function editClientDetails()
    {
        dd('dasdasd');
    }

    public function updateClientDetails(Request $request)
    {
        dd('dasdasd');
    }



}
