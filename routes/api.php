<?php

use Illuminate\Routing\Router;

$router->group(['namespace' => 'TwitterCloneApi\src\Controllers', 'prefix' => 'user'], function (Router $router) {
    $router->post('/', ['name' => 'users.store', 'uses' => 'UserController@store']);
});
