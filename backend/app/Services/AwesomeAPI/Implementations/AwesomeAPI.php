<?php

namespace App\Services\AwesomeAPI\Implementations;

use App\Services\AwesomeAPI\Contracts\ExchangeRate;

use App\Services\Http\Factory\Factory;
use App\Services\Http\Response\Response;

use App\Services\Validator\Exchange;

class AwesomeAPI implements ExchangeRate
{
    public function uniques(): Response
    {
        return Factory::get("https://economia.awesomeapi.com.br/json/available/uniq");
    }

    public function combinations(): Response
    {
        return Factory::get("https://economia.awesomeapi.com.br/json/available");
    }

    public function exchanges(Exchange $exchange): Response
    {
        $uri = sprintf(
            "https://economia.awesomeapi.com.br/%s/%d?start_date=%d&end_date=%d",
            $exchange->name(),
            $exchange->quantity(),
            $exchange->begin(),
            $exchange->end()
        );

        return Factory::get($uri);
    }
}
