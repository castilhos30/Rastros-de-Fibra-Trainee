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

    public function store()
    {
        $parameters =  [
            'titulo' => $_POST['titulo'],
            'descricao' => $_POST['descricao'],
            'criador' => 'Admin',
            'foto' => 'imgnormal.jpg',
            'data' => date('Y-m-d H:i:s'),
            'id_usuario' => 1
        ];

        App::get('database')->insert('posts', $parameters);

        header('Location: /lista-posts');
    }

    public function delete()
    {
        $id = $_POST['id'];

        App::get('database')->delete('posts', $id);

        header('Location: /lista-posts');
    }
}