<?php

namespace App\Services\Validator;

use Exception;

class Unix
{
    /** @var int */
    private int $timestamp;

    private const DEFAULT = 'Ymd';

    public function __construct(int $timestamp)
    {
        $strlen = strlen($timestamp);

        switch ($strlen) {
            case 10:
                $this->timestamp = $timestamp;
                break;
            case 13:
                $this->timestamp = $timestamp / 1000;
                break;
            default:
                throw new Exception();
        }
    }

    public function yyyymmdd(): string
    {
        return date(static::DEFAULT, $this->timestamp);
    }
}
