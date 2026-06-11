<?php

namespace App\Controllers;
use App\Controllers\ListaPostsController;
use App\Core\Router;

$router->get('', 'ExampleController@index');

$router->get('lista-de-posts', 'ListaPostsController@index');
$router->post('lista-de-posts/create', 'ListaPostsController@store');
$router->post('lista-de-posts/delete', 'ListaPostsController@delete');
$router->post('lista-de-posts/edit', 'ListaPostsController@edit');