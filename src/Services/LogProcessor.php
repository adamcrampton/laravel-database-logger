<?php

namespace AdamCrampton\LaravelDatabaseLogger\Services;

class LogProcessor
{
    public function __invoke(array $record)
    {
        $record['extra'] = [
            'origin' => request()->headers->get('origin'),
            'user_id' => auth()->user() ? auth()->user()->id : null,
            'ip_address' => request()->server('REMOTE_ADDR'),
            'user_agent' => request()->server('HTTP_USER_AGENT')
        ];

        return $record;
    }
}