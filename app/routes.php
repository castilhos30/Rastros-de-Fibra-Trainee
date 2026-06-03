<?php

namespace App\Controllers;
use App\Controllers\ExampleController;
use App\Controllers\UserController;
use App\Core\Router;

    $router->get('index', 'ExampleController@index');

    $router->get('lista-de-usuarios', 'UserController@index');
    $router->post('lista-de-usuarios/criar', 'UserController@store');
    $router->post('lista-de-usuarios/editar', 'UserController@edit');
    $router->post('lista-de-usuarios/deletar', 'UserController@delete');