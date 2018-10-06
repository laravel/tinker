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
        // Paths when already published and set in app's configs
        if(false === getenv('PSYSH_CONFIG'))
            if(config('tinker.options_path'))
                putenv('PSYSH_CONFIG=' . $source = config('tinker.options_path'));

        // Initial state, when not yet published, as not all apps will have published Tinker configs.
        $source = isset($source) ? $source : ( 
            realpath( $raw = __DIR__ . '/../config/tinker.php') ?: $raw 
        );


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
