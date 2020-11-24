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

       ClientDetail::create([
            'user_id' => $id,
            'ein'=>isset($data['ein'])?$data['ein']:null,
            'ssn'=>isset($data['ssn'])?$data['ssn']:null,
            'business_name'=>isset($data['business_name'])?$data['business_name']:null,
            'phone_number'=>$data['phone_number'],
            'sex'=>isset($data['sex'])?$data['sex']: null ,
            'referred_by'=>isset($data['referred_by'])?$data['referred_by']:null,
        ]);
        return $user;
    }
}
