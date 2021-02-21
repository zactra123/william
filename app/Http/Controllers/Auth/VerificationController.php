<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\User;
class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;


    public function verify(Request $request, $id)
    {

        $signuture = $request->signature;
        if (! $this->guard()->onceUsingId($id)) {
            throw new AuthorizationException;
        }
        $user = $this->guard()->user();

        if (empty($user->password)) {
            if($request->isMethod("POST")) {
                $this->validator($request->all())->validate();
                $user->update(['password'=> Hash::make($request->password)]);

            }else {
                return view("auth.passwords.setup", compact("id", "signuture"));
            }
        }

        if ($user->hasVerifiedEmail()) {
            return redirect($this->redirectPath());
        }

        if ($user->markEmailAsVerified()) {
            event(new Verified($user));
        }
        if ($user->hasVerifiedEmail()) {
            if ($user->role == "client") {
                $user->clientDetails->update(["registration_steps" => "documents"]);
            }
        }

        Auth::login($user, true);
        return redirect($this->redirectPath())->with('verified', true);
    }
    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    protected $redirectTo;
    public function redirectTo()
    {

        switch(Auth::user()->role){
            case 'admin':
                $this->redirectTo = 'admin';
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
                if(empty(auth()->user()->clientDetails)){
                    $this->redirectTo = 'client/registration-steps';
                    return $this->redirectTo;
                    break;
                }else{
                    $this->redirectTo = '/client/details';
                    return $this->redirectTo;
                    break;
                }
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

//        $this->middleware('auth');
//        $this->middleware('signed')->only('verify');
//        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }


    /**
     * Resend the email verification notification.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function resend(Request $request)
    {

        if ($request->user()->hasVerifiedEmail()) {
            return redirect($this->redirectPath());
        }
       $email_count =  Auth::user()->email_count;
        if($email_count<3){
            $email_count = $email_count +1;
            User::where('id', Auth::user()->id)->update(['email_count'=> $email_count]);

            $request->user()->sendEmailVerificationNotification();

            return back()->with('resent', true);
        }else{
            return back()->with('unread', true);
        }

    }

    protected function guard()
    {
        return Auth::guard();
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }
}
