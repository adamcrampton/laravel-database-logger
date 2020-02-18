<?php

/*
|--------------------------------------------------------------------------
| Laravel Database Logger Config
|--------------------------------------------------------------------------
|
| Set the expiration time here (in days), then place an entry in your
| project's app\Console\Kernel.php file:
|
| $schedule->command('logs:prune')->dailyAt('00:00');
|
*/
return [
    'expiration' => 14
];
