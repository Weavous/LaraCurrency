<?php

namespace App\Services\Validator;

class Exchange
{
    /** @var string */
    private string $name;

    /** @var int */
    private int $quantity;

    /** @var int */
    private Unix $begin;

    /** @var int */
    private Unix $end;

    public function __construct(string $name, int $quantity, int $begin, int $end)
    {
        $this->name = $name;
        $this->quantity = $quantity;
        $this->begin = new Unix($begin);
        $this->end = new Unix($end);
    }

    public function name(): string
    {
        return $this->name;
    }

    public function quantity(): int
    {
        return $this->quantity;
    }

    public function begin(): int
    {
        return $this->begin->yyyymmdd();
    }

    public function end(): int
    {
        return $this->end->yyyymmdd();
    }
}
