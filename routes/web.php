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

$router->get('/', function () use ($router) {
    return $router->app->version();
});


$router->get('arte/index', 'CatalogoController@index');
$router->get('/arte/index/{id}', 'CatalogoController@show');
$router->post('/arte/add', 'CatalogoController@store');
$router->put('/arte/update/{id}', 'CatalogoController@update');
$router->delete('/arte/delete/{id}', 'CatalogoController@delete');
