# laravel-database-logger
Laravel logs to database table via custom Monolog channel + Eloquent model.

## Installation
* Run ```composer require adamcrampton/laravel-database-logger``` in your project directory
* Add library service provider ```AdamCrampton\LaravelDatabaseLogger\LogServiceProvider::class``` to ```config.app```
* Run ```php artisan migrate``` to set up the ```logs``` table
* In ```config\logging.php```, add a new channel for the custom logs:

```'channels' => [
    'database' => [
        'driver' => 'custom'
        'via' => \AdamCrampton\LaravelDatabaseLogger\Services\LogMonoLog::class
    ]
]
```
* Add a setting to your .env file for the new channel name: ```LOG_CHANNEL=database```