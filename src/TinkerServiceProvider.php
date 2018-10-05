<?php

namespace Laravel\Tinker;

use Illuminate\Foundation\Application as LaravelApplication;
use Illuminate\Support\ServiceProvider;
use Laravel\Lumen\Application as LumenApplication;
use Laravel\Tinker\Console\TinkerCommand;

class TinkerServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Boot the service provider.
     *
     * @return void
     */
    public function boot()
    {

        // If not already set, will inspect the application configuration options
        // to check if a custom options_path has been set, if so, will signal
        // Psy shell to mount custom options when it starts, PSYSH_CONFIG env var.
        if(false === getenv('PSYSH_CONFIG'))
            if(config('tinker.options_path'))
                putenv('PSYSH_CONFIG=' . config('tinker.options_path'));


        $source = realpath($raw = __DIR__ . '/../config/tinker.php') ?: $raw;

        if ($this->app instanceof LaravelApplication && $this->app->runningInConsole()) {
            $this->publishes([$source => config_path('tinker.php')]);
        } elseif ($this->app instanceof LumenApplication) {
            $this->app->configure('tinker');
        }

        $this->mergeConfigFrom($source, 'tinker');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('command.tinker', function () {
            return new TinkerCommand;
        });

        $this->commands(['command.tinker']);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['command.tinker'];
    }
}
