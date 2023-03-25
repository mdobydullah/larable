<?php

namespace Obydul\Larable;

class Helper
{
    // available services
    public function services(): array
    {
        // all services
        $all_services = [
            'Like',
            'Follow',
            'Subscribe',
        ];

        // read root composer.json
        $composer_json_path = base_path().'\composer.json';
        $composer_json_content = file_get_contents($composer_json_path);
        $composer_json_data = json_decode($composer_json_content, true);

        return $composer_json_data['extra']['obydul/larable'] ?? $all_services;
    }
}
