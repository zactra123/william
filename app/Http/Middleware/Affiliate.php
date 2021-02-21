<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Affiliate
{
    /**
     * Handle an incoming request.
     *we
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
//        if (!Auth::check()) {
//            return redirect()->route('login');
//        }
//        elseif ( Auth::user()->role != 'affiliate'){
//            return redirect()->to('/');
//        }
//        return $next($request);

        if (!Auth::check()) {
            return redirect()->route('login');
        } elseif ( Auth::user()->role != 'affiliate') {
            return redirect()->to('/');
        }elseif(Auth::user()->role == 'affiliate' && Auth::user()->active ==0 ){
            Auth::logout();
            return redirect()->to('login')->withErrors(['error'=>"Your account is locked please connect to administrator "]);
        }

        if($request->path() == "affiliate/important-information" && $request->method() =='GET'){
            if(!empty(auth()->user()->secret_answer) &&
                !empty(auth()->user()->secret_question_id) &&
                !empty(auth()->user()->first_name) &&
                !empty(auth()->user()->last_name) &&
                !empty(auth()->user()->clientDetails["phone_number"])) {

                return redirect()->to('affiliate');
            }

        }elseif($request->path() != "affiliate/important-information" && $request->method() =='GET'){
            if(empty(auth()->user()->secret_answer) ||
                empty(auth()->user()->secret_questions_id) ||
                empty(auth()->user()->first_name) ||
                empty(auth()->user()->last_name) ||
                empty(auth()->user()->clientDetails["phone_number"])) {
                return redirect()->to('affiliate/important-information');
            }

            if(auth()->user()->clientDetails->registration_steps == 'registered' && auth()->user()->hasVerifiedEmail()){
                return redirect()->to('email/verify');
            }

        }
        return $next($request);



    }
}
