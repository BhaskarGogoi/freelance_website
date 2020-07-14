<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class PhoneVerifiedChecker
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
        if(Auth::user()->phone_verified == '1'){
            return $next($request);
        }elseif(Auth::user()->phone_verified == '0') {
            return redirect('/verifyPhone')->with('status', 'Your phone no is not verified with us.');
        }
    }
}   


