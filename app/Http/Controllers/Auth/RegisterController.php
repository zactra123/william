<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\SecretQuestion;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Auth;
use Session;
use App\ClientDetail;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = 'email/verify';

        // return $next($request);


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware('guest');
    }


    public function showRegistrationForm()
    {
        return redirect(route('register.Affiliate'));
        $secrets=DB::table('secret_questions')->where('user_id', null)
            ->select('question','id')->get();
        return view('auth.register',compact('secrets'));
    }


    public function registerAffiliate()
    {
        $secrets=DB::table('secret_questions')->select('question','id')->get();

        return view('auth.register_as_affiliate',compact('secrets'));
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        if($data['role']!='affiliate'){

            if($data['role']!='client'){
                return redirect(route('register.Affiliate'))->status(301);
            }
            return Validator::make($data, [
                'full_name' => ['required', 'string', 'max:255'],
                'sex'=> ['required'],
                'phone_number'=> ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'secret_questions_id'=>['required'],
                'secret_answer'=>['required'],
            ]);
        }else{
            return Validator::make($data, [
                'full_name' => ['required', 'string', 'max:255'],
                'phone_number'=> ['required', 'string', 'max:255'],
                'address'=> ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'secret_questions_id'=>['required'],
                'secret_answer'=>['required'],
            ]);
        }

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        if(isset($data['own_secter_question']) && $data['secret_questions_id'] == 'other'){

           $secreteQuestion =  SecretQuestion::create([
               'question'=>$data['own_secter_question']
           ]);

        }


        $full_name = explode(" ", $data["full_name"]);
        $data["first_name"] = array_shift($full_name);
        $data["last_name"] = implode(" ", $full_name);

        $user =   User::create([
            'first_name' =>$data["first_name"],
            'last_name'=> $data["last_name"],
            'email' => $data['email'],
            'role'=>$data['role'],
            'secret_questions_id'=>isset($secreteQuestion)?$secreteQuestion->id:$data['secret_questions_id'],
            'secret_answer'=>trim($data['secret_answer']),
            'password' => Hash::make($data['password']),
        ]);


       $id = $user->id;

        if(isset($secreteQuestion)){
            SecretQuestion::whereId($secreteQuestion->id)->update([
                'user_id'=>$id,
            ]);
        }

        if($data['role'] == 'affiliate'){

            $splitAddress = $this->splitAddress(str_replace([", USA", ",USA"], '', strtoupper($data['address'])));

            preg_match("/([0-9]{1,})/im", $splitAddress['street'], $number);
            $data["number"] = isset($number[0])?$number[0]:null;
            $data['name'] = trim(str_replace($data ["number"], '', $splitAddress['street']));
            $data['city'] = $splitAddress['city'];
            $data['state'] = $splitAddress['state'];
            $data['zip'] =$splitAddress['zip'];
            $data['registration_steps'] = "finished";


            ClientDetail::create([
                'user_id' => $id,
                'ein'=>isset($data['ein'])?$data['ein']:null,
                'ssn'=>isset($data['ssn'])?$data['ssn']:null,
                'business_name'=>isset($data['business_name'])?$data['business_name']:null,
                'number'=>$data ["number"],
                'name'=>$data ["name"],
                'city'=>$data ["city"],
                'state'=>$data ["state"],
                'zip'=>$data ["zip"],
                'address'=>strtoupper($data['address']),
                'phone_number'=>$data['phone_number'],
            ]);
        }else{
            ClientDetail::create([
                'user_id' => $id,
                'ssn'=>isset($data['ssn'])?$data['ssn']:null,
                'phone_number'=>$data['phone_number'],
                'sex'=>isset($data['sex'])?$data['sex']: null ,
                'referred_by'=>isset($data['referred_by'])?$data['referred_by']:null,
            ]);
        }


        return $user;
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
