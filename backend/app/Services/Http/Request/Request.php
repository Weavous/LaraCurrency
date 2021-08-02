<?php

namespace App\Services\Http\Request;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Psr7\Response as GuzzleHttpResponse;

use App\Services\Http\Response\Response;

use Exception;
use stdclass;

class Request
{
    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function get(string $uri): Response
    {
        $request = NULL;

        try {
            $request = $this->client->get($uri);
        } catch (Exception $e) {
            if ($e instanceof ConnectException) {
                return new Response(false, new stdclass);
            }
        }

        $isOk = $request instanceof GuzzleHttpResponse;

        if ($isOk === false) {
            return new Response(false, new stdclass);
        }

        if ($request->getStatusCode() !== 200) {
            return new Response(false, new stdclass);
        }

        return new Response(true, json_decode($request->getBody()));
    }
}
