<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class UserController
{
    public function index()
    {
        $usuarios = App::get('database')->selectAll('usuarios');
        return view('admin/lista-usuarios', compact('usuarios'));
    }
}