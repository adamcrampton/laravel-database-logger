# laravel-database-logger
Laravel logs to database table via custom Monolog channel + Eloquent model.

## Installation
* Run ```composer require adamcrampton/laravel-database-logger``` in your project directory
* Add library service provider ```AdamCrampton\LaravelDatabaseLogger\LogServiceProvider::class``` to ```config\app.php```
* Run ```php artisan migrate``` to set up the ```logs``` table
* In ```config\logging.php```, add a new channel for the custom logs:

```'channels' => [
    'database' => [
        'driver' => 'custom',
        'via' => \AdamCrampton\LaravelDatabaseLogger\Services\LogMonoLog::class
    ]
]
```
* Add a setting to your .env file for the new channel name: ```LOG_CHANNEL=database```

## Usage
The package is pretty much a custom channel for Monolog, so you can use the existing facade and methods.

These columns are automatically populated when adding to the log:
* ```description``` The log message
* ```origin``` The origin value from the request header
* ```type``` Log type (```log```, ```store```, ```change```, or ```delete```)
* ```result``` Log result (```success```, ```neutral```, or ```failure```)
* ```level``` Log message level (```emergency```, ```alert```, ```critical```, ```error```, ```warning```, ```notice```, ```info```, or ```debug```)

Additionally, you can pass in a ```category``` and ```sub_category``` value, which will be saved to those columns when generating a log entry. Example:

```Log::info('test', ['category' => 'This is a category', 'sub_category' => 'This is a subcategory]);```