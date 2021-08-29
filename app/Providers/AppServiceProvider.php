<?php

namespace App\Providers;

use App\Helper;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Support\ServiceProvider;

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
    public function boot(UrlGenerator $url)
    {
        //Force https to the url for production environment
        if(Helper::getIpAddress() != "127.0.0.1") {
            $url->forceScheme('https');
        }
    }
}
