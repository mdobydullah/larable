<?php

namespace Obydul\Larable;

use Illuminate\Support\ServiceProvider;

class LarableServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            \dirname(__DIR__).'/config/larable.php' => config_path('larable.php'),
        ], 'config');

        $this->publishes([
            \dirname(__DIR__).'/migrations/' => database_path('migrations'),
        ], 'migrations');
    }

    public function register()
    {
        $this->mergeConfigFrom(
            \dirname(__DIR__).'/config/larable.php',
            'larable'
        );
    }
}
