<?php

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

$router->group(['prefix' => 'api/v1'], function($router)
{
  $router->post('todo','TodoController@createTodo');
  $router->put('todo/{id}','TodoController@updateTodo');
    
  $router->delete('todo/{id}','TodoController@deleteTodo');
  $router->get('todos','TodoController@index');
});