Larable
---

Collection of morphable features and packages for Laravel application.

[![CI](https://github.com/mdobydullah/larable/actions/workflows/ci.yml/badge.svg)](https://github.com/mdobydullah/larable/actions/workflows/ci.yml)

## Installation

```shell
composer require obydul/larable
```

### Configuration

This step is optional

```php
php artisan vendor:publish --provider="Obydul\\Larable\\LarableServiceProvider" --tag=config
```

### Migrations

**You need to publish the migration files for use the package:**

```php
php artisan vendor:publish --provider="Obydul\\Larable\\LarableServiceProvider" --tag=migrations
```

### Collections

The available morphable packages/features.

| Service Name | Feature/Package                                                           | Description                         |
|--------------|---------------------------------------------------------------------------|-------------------------------------|
| Like         | [laravel-like:v5.1.1](https://github.com/overtrue/laravel-like)           | User like feature feature.          |
| Follow       | [laravel-follow:v5.1.0](https://github.com/overtrue/laravel-follow)       | User follow unfollow feature .      |
| Subscribe    | [laravel-subscribe:v4.2.0](https://github.com/overtrue/laravel-subscribe) | User subscribe unsubscribe feature. |
| Favorite     | [laravel-favorite:v5.1.0](https://github.com/overtrue/laravel-favorite)   | User favorite unfavorite feature.   |
| Vote         | [laravel-vote:v3.1.0](https://github.com/overtrue/laravel-vote)           | User voting feature.                |

## Cleanup Unused Services

Currently, there are 5 services. We will keep adding more services. The chances are good that you will not want them all. In order to avoid shipping these dependencies with your code, you can run the ```Obydul\Larable\Task\Composer::cleanup``` task and specify the services you want to keep in ```composer.json```:

```json
{
    "require": {
        "obydul/larable": "^1.1"
    },
    "scripts": {
        "pre-autoload-dump": "Obydul\\Larable\\Task\\Composer::cleanup"
    },
    "extra": {
        "obydul/larable": [
            "Like",
            "Follow"
        ]
    }
}
```

This example will remove all services other than "Like" and "Follow" when ```composer update``` or a fresh ```composer install``` is run.

**IMPORTANT**: If you add any services back in ```composer.json```, you will need to remove the ```vendor/obydul/larable``` directory explicitly for the change you made to have effect:

```
rm -r vendor/obydul/larable
composer update
```

## License

The MIT License (MIT). Please see [License File](https://github.com/mdobydullah/larable/blob/master/LICENSE) for more information.