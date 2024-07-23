<?php

namespace MaaSolutions\SimpleAddress;

use Illuminate\Support\ServiceProvider;
use MaaSolutions\SimpleAddress\Helpers\SimpleAddress;

class SimpleAddressServiceProvider extends ServiceProvider
{
    public function boot()
    {
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
            __DIR__ . '/../database/migrations/create_addresses_table.php.stub' => $this->getMigrationFilename('create_addresses_table'),
        ], 'simple-address-migrations');

        $this->publishes([
            __DIR__ . '/../config/simple-address.php' => config_path('simple-address.php'),
        ], 'simple-address-config');
    }

    private function getMigrationFilename($name)
    {
        $date = date('Y_m_d_His', time());

        return database_path("migrations/{$date}_{$name}.php");
    }
}
