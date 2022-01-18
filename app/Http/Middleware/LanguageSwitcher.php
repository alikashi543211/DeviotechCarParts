<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Session;
use App;
use Config;

class LanguageSwitcher
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
        if (session()->has('site_locale')) {
            App::setlocale(session()->get('site_locale'));
        }
        return $next($request);
    }
}
