<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Foundation\Auth\ConfirmsPasswords;

class ConfirmPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Confirm Password Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password confirmations and
    | uses a simple trait to include the behavior. You're free to explore
    | this trait and override any functions that require customization.
    |
    */

    use ConfirmsPasswords;

    /**
     * Where to redirect users when the intended url fails.
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
        $this->middleware('auth');
    }
}
