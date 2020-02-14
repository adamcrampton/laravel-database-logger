<?php

namespace AdamCrampton\LaravelDatabaseLogger\Services;

use Monolog\Logger;
use Monolog\Handler\AbstractProcessingHandler;

use AdamCrampton\LaravelDatabaseLogger\Models\Log;
use AdamCrampton\LaravelDatabaseLogger\Services\LogFormatter;


class LogHandler extends AbstractProcessingHandler
{
    public function __construct($level = Logger::DEBUG)
    {
        parent::__construct($level);
    }

    protected function write(array $record)
    {
        try {
            $log = new Log();
            $log->fill($record['formatted']);
            $log->save();
        } catch (\Exception $e) {
            $e->getMessage();
        }
     }

    protected function getDefaultFormatter()
    {
        return new LogFormatter();
    }
}