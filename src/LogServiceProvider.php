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
        //
    }
}
