<?php

namespace AdamCrampton\LaravelDatabaseLogger;

use Illuminate\Support\ServiceProvider;

class LogServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
    }

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'laravel-database-logger');
    }
}
