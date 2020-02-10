<?php

namespace AdamCrampton\LaravelDatabaseLogger\Services;

use Illuminate\Support\Arr;
use Monolog\Formatter\NormalizerFormatter;


class LogFormatter extends NormalizerFormatter
{
    /**
     * Type
     */
    const LOG = 'log';
    const STORE = 'store';
    const CHANGE = 'change';
    const DELETE = 'delete';

    /**
     * Result
     */
    const SUCCESS = 'success';
    const NEUTRAL = 'neutral';
    const FAILURE = 'failure';

    public function __construct()
    {
        parent::__construct();
    }

    public function format(array $record)
    {
        $record = parent::format($record);
        return $this->getDocument($record);
    }
    /**
     * Extract log data into array we can use to insert to the logs table.
     * @param array $record
     * @return array
     */
    protected function getDocument(array $record)
    {
        $fills = $record['extra'];
        $fills['level'] = strtolower($record['level_name']);
        $fills['description'] = $record['message'];

        $context = $record['context'];
        if (!empty($context)) {
            $fills['type'] = Arr::has($context, 'type') ? $context['type'] : self::LOG;
            $fills['result'] = Arr::has($context, 'result')  ? $context['result'] : self::NEUTRAL;
        }
        
        $fills = array_merge($record['context'], $fills);
        
        return $fills;
    }
}
