<?php

namespace App\Http\Middleware;

use Closure;

class Seo
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
        elseif ( Auth::user()->role == 'client'){
            return redirect()->to('/');
        }
        return $next($request);
    }
}
