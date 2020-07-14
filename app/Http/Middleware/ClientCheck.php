<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;


use Closure;

class ClientCheck
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
        if(Auth::user()->usertype == 'client'){
            return $next($request);
        }elseif(Auth::user()->usertype == 'user') {
            return redirect('/dashboard')->with('status', 'You are not allowed to client dashboard');
        }elseif(Auth::user()->usertype == 'admin') {
            return redirect('/admin-dashboard')->with('status', 'You are not allowed to client dashboard');
        }
    }
}
