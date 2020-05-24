<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\User;
use App\Clinet_details;

class Client
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

       if (!Auth::check()) {
           return redirect()->route('login');
       } elseif ( Auth::user()->role != 'client') {
            return redirect()->to('/');
       }elseif(Auth::user()->role == 'client' && Auth::user()->active ==0 ){
           Auth::logout();
           return redirect()->to('login')->withErrors(['error'=>"Your account is locked please connect to administrator "]);
       }
       if($request->path() != "client/registration-steps" && $request->method() =='GET'){
           if($request->path() =="client/continue"){
               return $next($request);
           }elseif(auth()->user()->clientDetails->registration_steps != 'finished'){
               return redirect()->to('client/registration-steps');
           }

       }
        return $next($request);
    }
}
