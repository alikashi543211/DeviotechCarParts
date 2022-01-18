<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Closure;

class EnsurePackage
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
        $user = auth()->user();
        $profile = $user->sellerProfile;

        if($user->role == 'seller' && !is_null($profile->subscription_type)){
            return $next($request);
        }
        return redirect('/seller/select-package');
    }
}
