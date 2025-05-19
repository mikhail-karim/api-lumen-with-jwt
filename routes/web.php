<?php

use Illuminate\Support\Facades\DB;

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
$router->get('/db-check', function () {
    return DB::connection()->getDatabaseName();
});
$router->get('/student', 'StudentController@index');
$router->post('/student', 'StudentController@create');
$router->get('/student/{id}', 'StudentController@read');
$router->put('/student/{id}', 'StudentController@update');
$router->delete('/student/{id}', 'StudentController@delete');

$router->post('auth/login', 'AuthController@login');
$router->post('auth/logout', 'AuthController@logout');
$router->post('auth/refresh', 'AuthController@refresh');
$router->post('auth/info', 'AuthController@user_info');