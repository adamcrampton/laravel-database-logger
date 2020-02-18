<?php

namespace AdamCrampton\LaravelDatabaseLogger;

use Illuminate\Support\ServiceProvider;

class LogServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/database_logger.php' => config_path('database_logger.php')
        ]);
    }

    public function register()
    {
        $this->commands([
            \AdamCrampton\LaravelDatabaseLogger\Commands\PruneLogTable::class
        ]);
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
    }
}
