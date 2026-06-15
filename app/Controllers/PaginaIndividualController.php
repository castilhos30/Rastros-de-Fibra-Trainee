<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class PaginaIndividualController
{

    public function index()
    {
        $database = App::get('database');
        $post_id = isset($_GET['post']) ? (int) $_GET['post'] : null;

        $posts = $database->selectAll('posts');
        $post = array_filter($posts, function ($p) use ($post_id) {
            return $p->id === $post_id;
        });
        $post = reset($post);

        $usuarios = $database->selectAll('usuarios');
        $usuario = array_filter($usuarios, function ($u) use ($post) {
            return $u->id === $post->id_usuario;
        });
        $usuario = reset($usuario);

        $interacoes = $database->selectAll('interacoes');
        $interacao = array_filter($interacoes, function ($p) use ($post) {
            return $p->id_post === $post->id;
        });
        $interacao = reset($interacao);

        $comentarios = $database->selectAll('comentarios');
        $comentario_arr = array_filter($comentarios, function ($c) use ($post) {
            return $c->id_post === $post->id;
        });

        return view('site/pagina-individual', [
            'post' => $post,
            'usuarios' => $usuarios,
            'usuario' => $usuario,
            'interacao' => $interacao,
            'comentario_arr' => $comentario_arr,
        ]);
    }

    public function store()
    {
        $parameters = [
            'id_criador' => $_SESSION['id'],
            'id_post' => $_POST['id_post'],
            'texto' => $_POST['texto'],
            'data' => date('Y-m-d H:i:s'),
        ];
        App::get('database')->insert('comentarios', $parameters);
        header(sprintf("Location: /pagina-individual?post={$_POST['id_post']}"));
    }
}