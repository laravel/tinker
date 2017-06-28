<?php

namespace Laravel\Tinker;

use Illuminate\Support\ServiceProvider;
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

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/tinker.php' => $this->app['path.config'].DIRECTORY_SEPARATOR.'tinker.php',
            ]);
        }
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
