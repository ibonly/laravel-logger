<?php
namespace Ibonly\LaravelLogger;

use Illuminate\Support\ServiceProvider;

class LaravelLoggerServiceProvider extends ServiceProvider
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
        $config = realpath(__DIR__ . '/../resources/config/laravelLogger.php');
        $migration = realpath(__DIR__ . '/../resources/migration/create_logger_table.php');

        $this->publishes([
            $config => config_path('laravelLogger.php')
        ], 'config');

        if (! class_exists('CreateLoggerTable')) {
            $timestamp = date('Y_m_d_His', time());

            $this->publishes([
                $migration => database_path($timestamp.'_create_logger_table.php')
            ], 'migrations')
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->app->singleton('LaravelLogger', function() {

            return new LaravelLogger;
        });
    }

    /**
     * Get the services provided by the provider
     *
     * @return array
     */
    public function provides()
    {
        return ['LaravelLogger'];
    }
}

