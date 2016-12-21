# Laravel Tinker

[![Build Status](https://travis-ci.org/laravel/tinker.svg)](https://travis-ci.org/laravel/tinker)
[![Total Downloads](https://poser.pugx.org/laravel/tinker/d/total.svg)](https://packagist.org/packages/laravel/tinker)
[![Latest Stable Version](https://poser.pugx.org/laravel/tinker/v/stable.svg)](https://packagist.org/packages/laravel/tinker)
[![Latest Unstable Version](https://poser.pugx.org/laravel/tinker/v/unstable.svg)](https://packagist.org/packages/laravel/tinker)
[![License](https://poser.pugx.org/laravel/tinker/license.svg)](https://packagist.org/packages/laravel/tinker)

## Introduction

Laravel Tinker is a powerful REPL for the Laravel framework, abstracted from the core for the Laravel 5.4 release.

## Installation

To get started with Laravel Tinker, simply run:

    composer require laravel/tinker

Now register the `Laravel\Socialite\SocialiteServiceProvider` in your `config/app.php` file:

```php
'providers' => [
    // Other service providers...

    Laravel\Tinker\TinkerServiceProvider::class,
],
```

## Basic Usage

From your console, simply call `php artisan tinker`, and you're away!

## License

Laravel Tinker is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
