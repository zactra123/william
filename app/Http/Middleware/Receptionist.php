<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Receptionist
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
        elseif ( Auth::user()->role != 'receptionist'){
            return redirect()->to('/');
        }
        return $next($request);
    }

}
