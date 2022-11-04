<?php

namespace App\Providers;

use Hillel\Geo\Test\GeoServiceInterface;
use Hillel\Geo\Test\IpApiGeoService;
use Hillel\Geo\Test\MaxmindService;
use App\Services\UserAgent\UserAgentServiceInterface;
use App\Services\UserAgent\WhichBrowserService;
use GeoIp2\Database\Reader;
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
        $this->app->singleton(GeoServiceInterface::class, function(){
            return new MaxmindService();
        });
        $this->app->singleton(UserAgentServiceInterface::class, function(){
            return new WhichBrowserService();
        });

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
