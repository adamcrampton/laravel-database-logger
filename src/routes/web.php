<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'AdamCrampton\LaravelDatabaseLogger\Controllers'], function() {
    Route::get('logs/viewer', ['uses' => 'LogViewerController@index']);
});
