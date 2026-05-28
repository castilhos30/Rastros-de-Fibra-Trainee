<?php

namespace App\Controllers;
use App\Controllers\Lista-postsController;
use App\Core\Router;

$router->get('', 'Lista-postsController@index');