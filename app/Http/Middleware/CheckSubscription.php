<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckSubscription
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if( !Auth::user() || !(auth()->user()->subscribed('basic plan') || auth()->user()->subscribed('premium plan') || auth()->user()->subscribed('free trial')) ){
            return redirect('/');
        }
        return $next($request);
    }
}
