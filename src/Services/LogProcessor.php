<?php

namespace AdamCrampton\LaravelDatabaseLogger\Services;

class LogProcessor
{
    public function __invoke(array $record)
    {
        $record['extra'] = [
            'origin' => request()->headers->get('origin')
        ];

        return $record;
    }
}