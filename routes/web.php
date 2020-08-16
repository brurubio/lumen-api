<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/
// API routes
$router->get('balance/{id}', [
    'as' => 'api.get.balance',
    'uses' => 'ApiController@getBalance'
]);

$router->post('event', [
    'as' => 'api.post.event',
    'uses' => 'ApiController@postEvent'
]);

$router->post('reset', [
    'as' => 'api.post.reset',
    'uses' => 'ApiController@postReset'
]);
