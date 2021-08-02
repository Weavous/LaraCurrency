<?php

namespace App\Http\Controllers;

use App\Services\AwesomeAPI\Contracts\ExchangeRate;
use App\Services\AwesomeAPI\Implementations\AwesomeAPI;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

use App\Services\Http\Response\Response;

use Illuminate\Support\Facades\Validator;

use App\Services\Validator\Exchange;

use stdclass;

class AwesomeAPIController extends Controller
{
    /**
     * @var App\Services\AwesomeAPI\Implementations\AwesomeAPI
     */
    private AwesomeAPI $api;

    public function __construct()
    {
        $this->api = new AwesomeAPI();
    }

    public function uniques()
    {
        return response()->json($this->api->uniques()->data());
    }

    public function combinations(): JsonResponse
    {
        return response()->json($this->api->combinations()->data());
    }

    public function exchanges(Request $request): JsonResponse
    {
        $data = $request->only('name', 'quantity', 'begin', 'end');

        $validator = Validator::make($data, [
            'name' => 'required|string|regex:/^[A-Z]{3,}-[A-Z]{3,}$/i',
            'quantity' => 'required|string',
            'begin' => 'required|string|size:13',
            'end' => 'required|string|size:13'
        ]);

        if ($validator->fails()) {
            return new Response(false, new stdclass);
        }

        $exchange = new Exchange($request->name, $request->quantity, $request->begin, $request->end);

        return response()->json($this->api->exchanges($exchange)->data());
    }
}
