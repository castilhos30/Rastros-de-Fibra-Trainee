<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class ListaPostsController 
{
    public function index()
    {
        $posts = App::get('database')->selectAll('posts');

        return view('admin/lista-posts', compact('posts'));
    }
}