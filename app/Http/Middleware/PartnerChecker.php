<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class PartnerChecker
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
        if(Auth::user()->profile_created == '1'){
            return $next($request);
        } else {
            return redirect('/my-account')->with('status', 'You are not a service partner.');
        }
        
        
    }
}
