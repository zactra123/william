<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Auth\Events\Verified;
use Auth;
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


    public function verify(Request $request)
    {
        if (! $this->guard()->onceUsingId($request->route('id'))) {
            throw new AuthorizationException;
        }
        $user = $this->guard()->user();
        if ($user->hasVerifiedEmail()) {
            return redirect($this->redirectPath());
        }
        if ($user->markEmailAsVerified()) {
            event(new Verified($user));
        }
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
                    $this->redirectTo = '/client/details/create';
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

        // return $next($request);
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

    protected function guard()
    {
        return Auth::guard();
    }
}
