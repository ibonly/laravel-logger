<?php

namespace Ibonly\LaravelSimpleLogger;

use Illuminate\Support\ServiceProvider;
use Ibonly\LaravelSimpleLogger\Exception\InvalidConfiguration;
use Ibonly\LaravelSimpleLogger\Model\LaravelLogger;

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

        $this->publishes([
            $config => config_path('laravelSimpleLogger.php')
        ], 'config');

        if (! class_exists('CreateSimpleLoggerTable')) {
            $timestamp = date('Y_m_d_His', time());

            $this->publishes([
                $migration => database_path($timestamp.'_create_simple_logger_table.php')
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

    public static function determineActivityModel(): string
    {
        $activityModel = config('laravelSimpleLogger.activity_model') ?? LaravelLogger::class;
        if (! is_a($activityModel, LaravelLogger::class, true)) {
            throw InvalidConfiguration::modelIsNotValid($activityModel);
        }

        return $activityModel;
    }

    public static function getActivityModelInstance(): Model
    {
        $activityModelClassName = self::determineActivityModel();

        return new $activityModelClassName();
    }
}

