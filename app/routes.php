<?php

namespace App\Controllers;
use App\Controllers\ExampleController;
use App\Controllers\UserController;
use App\Core\Router;

$router->get('', 'ExampleController@index');

$router->get('pagina-de-posts', 'PaginaPostsController@index');

$router->get('lista-de-usuarios', 'UserController@index');
$router->post('lista-de-usuarios/criar', 'UserController@store');
$router->post('lista-de-usuarios/editar', 'UserController@edit');
$router->post('lista-de-usuarios/deletar', 'UserController@delete');