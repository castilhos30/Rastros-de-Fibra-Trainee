<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class UserController
{

    public function index()
    {
        return view('admin/lista-usuarios');
    }
}