<?php

namespace App\Services\Http\Response;

class Response
{
    private bool $status;

    private $data;

    public function __construct(bool $status, $data)
    {
        $this->status = $status;

        $this->data = $data;
    }

    public function data(): array
    {
        return [
            "timestamp" => now(),
            "self" => [
                "timeout" => microtime(true) - LARAVEL_START,
                "count" => count((array) $this->data)
            ],
            "data" => $this->data
        ];
    }

    public function status(): bool
    {
        return $this->status;
    }
}
