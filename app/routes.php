<?php

namespace App\Controllers;
use App\Controllers\ListaPostsController;
use App\Core\Router;

$router->get('', 'ExampleController@index');

$router->get('lista-posts', 'ListaPostsController@index');
$router->post('lista-posts/create', 'ListaPostsController@store');
$router->post('lista-posts/delete', 'ListaPostsController@delete');
$router->post('lista-posts/edit', 'ListaPostsController@edit');