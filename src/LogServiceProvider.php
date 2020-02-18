<?php

namespace AdamCrampton\LaravelDatabaseLogger;

use Illuminate\Support\ServiceProvider;

class LogServiceProvider extends ServiceProvider
{
    public function boot()
    {
        //
    }

    public function register()
    {
        $this->commands([
            \AdamCrampton\LaravelDatabaseLogger\Commands\PruneLogTable::class
        ]);
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
    }
}
