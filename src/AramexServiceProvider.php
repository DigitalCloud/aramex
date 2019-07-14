<?php

namespace DigitalCloud\Aramex;

use Illuminate\Support\ServiceProvider;

class AramexServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/aramex.php' => config_path('aramex.php'),
        ], 'digitalcloud-aramex');

        $this->publishes([
            __DIR__ . '/../resources/lang' => resource_path('lang/vendor/aramex'),
        ], 'digitalcloud-aramex');
    }

    public function register()
    {
    }
}
