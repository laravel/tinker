<p align="center"><img src="https://laravel.com/assets/img/components/logo-tinker.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/tinker"><img src="https://travis-ci.org/laravel/tinker.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/tinker"><img src="https://poser.pugx.org/laravel/tinker/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/tinker"><img src="https://poser.pugx.org/laravel/tinker/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/tinker"><img src="https://poser.pugx.org/laravel/tinker/license.svg" alt="License"></a>
</p>

## Introduction

Laravel Tinker is a powerful REPL for the Laravel framework.

## Installation

To get started with Laravel Tinker, simply run:

    composer require laravel/tinker

Next, register the `Laravel\Tinker\TinkerServiceProvider` in your `config/app.php` file:

```php
'providers' => [
    // Other service providers...

    Laravel\Tinker\TinkerServiceProvider::class,
],
```

If you are using Lumen, register the `Laravel\Tinker\TinkerServiceProvider` in your `bootstrap/app.php` file

```php
/*
|--------------------------------------------------------------------------
| Register Service Providers
|--------------------------------------------------------------------------
|
| Here we will register all of the application's service providers which
| are used to bind services into the container. Service providers are
| totally optional, so you are not required to uncomment this line.
|
*/

// $app->register(App\Providers\AppServiceProvider::class);
// $app->register(App\Providers\AuthServiceProvider::class);
// $app->register(App\Providers\EventServiceProvider::class);

$app->register(Laravel\Tinker\TinkerServiceProvider::class);
```

## Basic Usage

From your console, execute the `php artisan tinker` command.

## License

Laravel Tinker is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
