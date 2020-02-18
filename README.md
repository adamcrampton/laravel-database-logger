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
* Update the log stack array in ```config\logging.php``` to include the new channel:

```
'stack' => [
    'driver' => 'stack',
    'channels' => ['daily', 'database'],
],
'database' => [
    'driver' => 'custom',
    'via' => \AdamCrampton\LaravelDatabaseLogger\Services\LogMonoLog::class
],
```

## Configuration
A scheduled task is bundled with the package, which will delete rows in the ```logs``` table older than the expiration setting. To use this:
* Run ```php artisan vendor:publish``` to publish the ```database_logger.php``` config file to your project
* Run ```php artisan config:cache``` to ensure the project config is up to date
* Set the expiration length (in days) in your project's ```config/database_logger.php``` file
* Add an entry to the ```app/Console/Commands/Kernel.php``` file to schedule the cron job, something like: ```$schedule->command('logs:prune')->dailyAt('07:45');```

To run the command manually: ```php artisan logs:prune```

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
