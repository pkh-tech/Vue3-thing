<?php

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;


/** @var \Laravel\Lumen\Routing\Router $router */
$router->get('/test', function () {
    return response()->json(['message' => 'Test route is working']);
});


$router->post('/auth/register', 'AuthController@register');
$router->post('/auth/login', 'AuthController@login');

$router->group(['middleware' => 'jwt.auth'], function () use ($router) {
    $router->get('/auth/profile', 'AuthController@profile'); 
    $router->post('/auth/logout', 'AuthController@logout');

    $router->get('/users/list', 'UserController@userList');
    $router->get('/users/current', 'AuthController@getUser');
});

$router->post('/llm', function (Request $request) {
    $client = new \GuzzleHttp\Client([
        'base_uri' => 'http://192.168.0.120:1234',
        'timeout'  => 60.0,
    ]);

    try {
        $res = $client->post('/v1/chat/completions', [
            'headers' => ['Content-Type' => 'application/json'],
            'body'    => json_encode($request->all(), JSON_UNESCAPED_SLASHES)
        ]);

        Log::debug('LLM endpoint rammes – forsøger nu at sende til model');

        return response()->json(json_decode($res->getBody(), true));
    } catch (\Exception $e) {
        Log::error('LLM-fejl: ' . $e->getMessage());
        Log::error('Stacktrace: ' . $e->getTraceAsString());
        return response()->json([
            'error' => 'LLM request failed',
            'message' => $e->getMessage(),
        ], 500);
    }
});

