<?php

namespace MaaSolutions\SimpleAddress;

use Illuminate\Support\ServiceProvider;
use MaaSolutions\SimpleAddress\Helpers\SimpleAddress;

class SimpleAddressServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        $this->offerPublishing();
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . "/../config/simple-address.php", "simple-address");

        $this->app->bind('simple_address', fn() => new SimpleAddress());
    }

    private function offerPublishing()
    {
        if (!$this->app->runningInConsole() || !function_exists('config_path')) {
            return;
        }

        $this->publishes([
            __DIR__ . '/../config/simple-address.php' => config_path('simple-address.php'),
        ], 'simple-address-config');
    }
}
