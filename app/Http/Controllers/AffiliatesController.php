<?php

namespace App\Http\Controllers;

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
            'secret_questions_id' => ['required'],
            'secret_answer' => ['required', 'string'],
        ]);

        if ($validation->fails()){
            return redirect()->back()
                ->withInput()
                ->withErrors($validation);
        }
        $affiliateId = Auth::user()->id;
        $user = User::create($clientData);
        $userId = $user->id;

        Affiliate::create([
            'affiliate_id' =>$affiliateId,
                'user_id' => $userId,
        ]);

        $user->sendEmailVerificationNotification();

        return redirect(route('affiliate.index'))->with('success', "You created  new customer");

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
