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

$router->get('/', function(){
    return 'welcome to cook book api';
});

$router->post('/api/register', 'UserController@store');

$router->group(['prefix' => 'api/', 'middleware' => 'auth'], function() use ($router){

    $router->group(['prefix' => 'users'],function() use ($router){
        $router->get('/',       'UserController@index');
        $router->get('/{id}',   'UserController@show');
        $router->put('/{id}',   'UserController@update');
        $router->delete('/{id}','UserController@destroy');
    });

    $router->group(['prefix' => 'recipes'],function() use ($router){
        $router->get('/',       'RecipeController@index');
        $router->get('/{id}',   'RecipeController@show');
        $router->post('/',      'RecipeController@store');
        $router->put('/{id}',   'RecipeController@update');
        $router->delete('/{id}','RecipeController@destroy');
    });
});
