<?php

namespace App\Http\Middleware;

use App\AllowedIp;
use Closure;
use Illuminate\Support\Facades\Auth;

class Admins
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
        }
        elseif ( !in_array(Auth::user()->role, ['admin','super admin', 'receptionist'])){
            return redirect()->to('/');
        }
        $allowed_ip = AllowedIp::where("user_id", Auth::user()->id)->where("ip_address", $request->ip())->first();
        if (!$allowed_ip && env("APP_ENV") != "local"){
            Auth::logout();
            return redirect()->route('login');
        }
        return $next($request);
    }
}
