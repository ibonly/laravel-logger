<?php

namespace Ibonly\LaravelSimpleLogger;

use Illuminate\Support\ServiceProvider;
use Ibonly\LaravelSimpleLogger\Exception\InvalidConfiguration;

class LaravelSimpleLoggerServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Publishes all the config file this package needs to function
     */
    public function boot()
    {
        $config = realpath(__DIR__ . '/../resources/config/laravelSimpleLogger.php');
        $migration = realpath(__DIR__ . '/../resources/migration/create_simple_logger_table.php');
        $migration2 = realpath(__DIR__ . '/../resources/migration/create_simple_is_online_logger_table.php');

        $this->publishes([
            $config => config_path('laravelSimpleLogger.php')
        ], 'config');

        if (! class_exists('CreateSimpleLoggerTable')) {
            $timestamp = date('Y_m_d_His', time());

            $this->publishes([
                $migration => database_path("/migrations/{$timestamp}_create_simple_logger_table.php")
            ], 'migrations');
        }

        if (! class_exists('CreateSimpleIsOnlineLoggerTable')) {
            $timestamp = date('Y_m_d_His', time());

            $this->publishes([
                $migration2 => database_path("/migrations/{$timestamp}_create_simpleis_online_logger_table.php")
            ], 'migrations');
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->app->singleton('LaravelSimpleLogger', function() {

            return new LaravelSimpleLogger;
        });
    }

    /**
     * Get the services provided by the provider
     *
     * @return array
     */
    public function provides()
    {
        return ['LaravelSimpleLogger'];
    }
}
