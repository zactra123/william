<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\ClientDetail;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo;
    protected $maxAttempts = 2;
    public function redirectTo()
    {

        switch(Auth::user()->role){
            case 'admin':
                $this->redirectTo = 'admins';
                return $this->redirectTo;
                break;
                case 'receptionist':
                $this->redirectTo = 'receptionist/message';
                return $this->redirectTo;
                break;
            case 'super admin':
                $this->redirectTo = '/owner';
                return $this->redirectTo;
                break;
            case 'affiliate':
                $this->redirectTo = '/affiliate';
                return $this->redirectTo;
                break;
            case 'client':
                $this->redirectTo = '/client/details';
                return $this->redirectTo;
                break;
            case 'seo':
                $this->redirectTo = '/admins/blogs';
                return $this->redirectTo;
                break;
            default:
                $this->redirectTo = '/login';
                return $this->redirectTo;
        }

    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request)
    {
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.

        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {

            return redirect()->to('/login-info-first');
//            $this->fireLockoutEvent($request);
//            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }
        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    public function recover()
    {
        return view('auth.login_information_1');
    }

    public function loginInfoFirst(Request $request)
    {

        if($request->method()=="GET"){
            if (empty(session("recover_client"))) {
                return redirect(route("login.infoFirst"));
            }
            $client = session("recover_client");
            return view('auth.login_information_2', compact('client'));
        }

        if($request->method()=="POST"){
            $clientInfo = $request->client;


            if(is_null($clientInfo['ssn']) && is_null($clientInfo['ein'])){
                // return back()->withErrors(  ['error'=>"Social Security card or EIN Number is required" ]);
                return back()->with('error','Social Security card or EIN Number is required');
            }

            if(!is_null($clientInfo['ssn'])){
                if($clientInfo['ssn']!= $clientInfo['ssn_confirm'])
                {
                    // return back()->withErrors(  ['error'=>"wrong social security number confirmation!" ]);
                    return back()->with('error','wrong social security number confirmation!');
                }
            }elseif(!is_null($clientInfo['ein'])){
                if($clientInfo['ein']!= $clientInfo['ein_confirm'])
                {
                    // return back()->withErrors(  ['error'=>"wrong ein number confirmation!" ]);
                    return back()->with('error','wrong ein number confirmation!');
                }
            }


            $client = DB::table('client_details')
                ->leftJoin('users', 'client_details.user_id','=', 'users.id')
                ->leftJoin('secret_questions', 'users.secret_questions_id', '=', 'secret_questions.id')
                ->where('client_details.ssn', $clientInfo['ssn'])
                ->where('client_details.ein', $clientInfo['ein'])
                ->where('users.last_name', $clientInfo['last_name'])
                // ->where('users.last_name', 'like', '%' .$clientInfo['last_name']. '%')
                ->select('users.id', 'secret_questions.question')
                ->first();

                // $client = User::where('last_name',$clientInfo['last_name'])
                //     ->first();
                // return $client;
            if(!empty($client)){
                session(["recover_client"=> $client]);
                return redirect(route("login.infoFirstSend"));
            }else{
                // return back()->withErrors(  ['error' => "Please connect our team"] );
                return back()->with('error','Please connect our team');
            }

        }
    }


    public function loginInfoSecond(Request $request)
    {

        if($request->method()=="POST"){

            $client = DB::table('users')
                ->where('id', $request->id)
                ->where('secret_answer', trim($request->answer))
                ->select('email', 'id')
                ->first();


            if(!empty($client)){

                return view('auth.reset_login_info', compact('client'));
            }else{
                // return back()->withErrors( ['error', "ANSWER IS INCORRECT"] );
                return back()->with('error','ANSWER IS INCORRECT');
            }
        }

    }

    public function loginInfoFinish(Request $request)
    {
        if($request->method()=="GET"){
            return view('auth.reset_login_info');
        }
        if($request->method()=="POST"){


            if($request->password != $request->password_confirmation){
                // return back()->withErrors( ['error', "Password confirmation doesn't match Password"] );
                return back()->with('error','Password confirmation does not match Password');
            }else{

               $user =  User::where('id', $request->id);
                $user->update(['password' => Hash::make($request->password)]);


                auth()->login($user->first());
                return redirect(route('login.infoFirst'))->with('success', "your data saved");
                
            }


        }
    }
}
