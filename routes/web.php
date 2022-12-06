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

$router->post('/registrasi', 'RegistrasiController@registrasi');
$router->post('/login', 'LoginController@login');
$router->group(['prefix' => '/produk'], function($router) {
    $router->post('/', 'ProdukController@create');
    $router->get('/', 'Produkcontroller@index');
    $router->get('/{id}', 'ProdukController@show');
    $router->post('/{id}/update', 'ProdukController@update');
    $router->delete('/{id}', 'ProdukController@destroy');
});