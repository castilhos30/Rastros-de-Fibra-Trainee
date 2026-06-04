<?php

namespace App\Controllers;
use App\Controllers\ExampleController;
use App\Core\Router;

$router->get('', 'ExampleController@index');

$router->get('login', 'LoginController@exibirLogin');
$router->post('login', 'LoginController@efetuaLogin');