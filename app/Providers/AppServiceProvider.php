<?php

namespace App\Providers;

use App\Models\Setting;
use App\Models\Language;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Blade;
use Route;
use View;
use Config;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        plan_config();
        Schema::defaultStringLength(191);
        Blade::if('routeis', function ($expression) {
            return fnmatch($expression, Route::currentRouteName());
        });
        
        
        
    }
}
