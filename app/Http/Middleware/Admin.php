<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\AllowedIp;


class Admin
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
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        elseif ( Auth::user()->role != 'admin'){
            return redirect()->to('/');
        }
        $allowed_ip = AllowedIp::where("user_id", Auth::user()->id)->where("ip_address", $request->ip())->first();
        if (!$allowed_ip && env("APP_ENV") != "local"){
//            logout
            return redirect()->route('login');
        }
        return $next($request);
    }
}
