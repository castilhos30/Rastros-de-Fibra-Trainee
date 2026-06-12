<?php

namespace App\Controllers;
use App\Controllers\ExampleController;
use App\Controllers\DashboardController;
use App\Core\Router;

$router->get('', 'ExampleController@index');
$router->get('dashboard', 'DashboardController@index');