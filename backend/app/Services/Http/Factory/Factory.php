<?php

namespace App\Services\Http\Factory;

use App\Services\Http\Request\Request;

use GuzzleHttp\Client;

class Factory
{
    /**
     * Returns an instance of Database\Factories\Helper\Factory and calls the method.
     * 
     * @param string $url
     * @param array $arguments
     */
    public static function __callStatic(string $url, array $arguments)
    {
        return call_user_func_array([new Request(new Client(['timeout' => 1])), $url], $arguments);
    }
}
