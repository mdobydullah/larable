Larable
---

Collection of morphable packages/features for Laravel application.

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

| Feature/Package                                                             | Description                                                 |
|-----------------------------------------------------------------------------|-------------------------------------------------------------|
| [overtrue/laravel-subscribe](https://github.com/overtrue/laravel-subscribe) | User subscribe/unsubscribe feature for Laravel Application. |
| [overtrue/laravel-follow](https://github.com/overtrue/laravel-follow)       | User follow unfollow system for Laravel.                    |

## License

The MIT License (MIT). Please see [License File](https://github.com/mdobydullah/larable/blob/master/LICENSE) for more information.