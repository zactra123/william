<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Auth;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
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
}
