<?php

namespace AdamCrampton\LaravelDatabaseLogger\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $table = 'logs';
    protected $guarded = ['id'];
}
