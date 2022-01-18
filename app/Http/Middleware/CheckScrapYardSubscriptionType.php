<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
class CheckScrapYardSubscriptionType
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
        if (Auth::user()->sellerProfile->subscription_type == 2 or Auth::user()->sellerProfile->subscription_type == 3){
            return $next($request);
        }else{
            return redirect()->back();
        }
    }
}
