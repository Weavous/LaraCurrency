<?php

namespace App\Services\AwesomeAPI\Contracts;

use App\Services\Http\Response\Response;

use App\Services\Validator\Exchange;

interface ExchangeRate
{
    public function uniques(): Response;
    public function combinations(): Response;
    public function exchanges(Exchange $exchange): Response;
}
