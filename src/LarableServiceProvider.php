<?php

namespace Obydul\Larable;

use Illuminate\Support\ServiceProvider;

class LarableServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // read root composer.json
        $composer_json_path = base_path().'\composer.json';
        $composer_json_content = file_get_contents($composer_json_path);
        $composer_json_data = json_decode($composer_json_content, true);
        $services = $composer_json_data['extra']['obydul/larable'] ?? (new Helper())->services();

        // config files
        foreach ($services as $service) {
            $new_config_name = 'larable_'.strtolower($service).'.php';
            $this->publishes([
                \dirname(__DIR__).'/src/'.$service.'/config.php' => config_path($new_config_name),
            ], 'config');
        }

        // migrations
        foreach ($services as $service) {
            $this->publishes([
                \dirname(__DIR__).'/src/'.$service.'/Migrations/' => database_path('migrations'),
            ], 'migrations');
        }
    }

    public function register()
    {
        $services = (new Helper())->services();
        foreach ($services as $service) {
            $new_config_name = 'larable_'.strtolower($service);

            $this->mergeConfigFrom(
                \dirname(__DIR__).'/src/'.$service.'/config.php',
                $new_config_name
            );
        }
    }
}
