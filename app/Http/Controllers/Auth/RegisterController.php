<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
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


    public function registerAffiliate()
    {
        return view('auth.register_as_affiliate');
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
                'dob' =>['required'],
                'sex'=> ['required'],
                'ssn'=> ['required', 'string', 'max:255'],
                'address'=> ['required', 'string', 'max:255'],
                'zip'=> ['required', 'string', 'max:255'],
                'phone_number'=> ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);
        }else{
            return Validator::make($data, [
                'full_name' => ['required', 'string', 'max:255'],
                'dob' =>['required'],
                'ssn'=> ['required', 'string', 'max:255'],
                'address'=> ['required', 'string', 'max:255'],
                'zip'=> ['required', 'string', 'max:255'],
                'phone_number'=> ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
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

       $fullName = explode(' ', strtoupper($data['full_name']));

       if(count($fullName)==1){
           return redirect()->back()
               ->withInput()
               ->with('error','Please enter Your First and Last name');
       }elseif(count($fullName)==2){
           $first_name = $fullName[0];
           $last_name = $fullName[1];
       }else{
           $first_name = $fullName[0];
           $last_name = $fullName[1];
           for($i=2; $i <= count($fullName)-1; $i++){
               $last_name = $last_name." ".$fullName[$i];
           }

       }


        $user =   User::create([
            'first_name'=>$first_name,
            'last_name'=>$last_name,
            'email' => $data['email'],
            'role'=>$data['role'],
            'password' => Hash::make($data['password']),
        ]);

       $id = $user->id;
       ClientDetail::create([
            'user_id' => $id,
            'phone_number'=>$data['phone_number'],
            'address'=>$data['address'],
            'city'=>null,
            'state'=> null,
            'zip'=>$data['zip'],
            'dob'=>$data['dob'],
            'sex'=>isset($data['sex'])?$data['sex']: null ,
            'ssn'=> $data['ssn'],
            'referred_by'=>isset($data['referred_by'])?$data['referred_by']:null,
            'business_name'=>isset($data['business_name'])?$data['business_name']:null,
        ]);
        Session::flash('success', 'Congrats! You just did something really wise');
        return $user;
    }


}
