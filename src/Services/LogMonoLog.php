<?php

namespace AdamCrampton\LaravelDatabaseLogger\Services;

use Monolog\Logger;
use AdamCrampton\LaravelDatabaseLogger\Services\LogHandler;
use AdamCrampton\LaravelDatabaseLogger\Services\LogProcessor;

class LogMonoLog
{
    /**
     * Create custom Monolog instance
     *
     * @param array $config
     * @return \Monolog\Logger
     */
    public function __invoke(array $config)
    {
        $logger = new Logger('database');
        $logger->pushHandler(new LogHandler());
        $logger->pushProcessor(new LogProcessor());

        return $logger;
    }
}
