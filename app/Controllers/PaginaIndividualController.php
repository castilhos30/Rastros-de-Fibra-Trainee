<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class PaginaIndividualController
{

    public function index()
    {
        checkLogin();
        $database = App::get('database');
        $post_id = isset($_GET['post']) ? (int) $_GET['post'] : null;

        $posts = $database->selectAll('posts');
        $post = array_filter($posts, function ($p) use ($post_id) {
            return (int) $p->id === $post_id;
        });
        $post = reset($post);

        $usuarios = $database->selectAll('usuarios');
        $usuario = array_filter($usuarios, function ($u) use ($post) {
            return (int) $u->id === (int) $post->id_usuario;
        });
        $usuario = reset($usuario);

        $interacoes = $database->selectAll('interacoes');
        $interacaoDoPost_arr = array_filter($interacoes, function ($i) use ($post) {
            return (int) $i->id_post === (int) $post->id;
        });
        $likes = 0;
        $dislikes = 0;
        $liked = false;
        $disliked = false;
        foreach ($interacaoDoPost_arr as $interacaoDoPost) {
            $likes += $interacaoDoPost->likes;
            $dislikes += $interacaoDoPost->dislikes;
            if ($interacaoDoPost->id_usuario === $_SESSION['id']) {
                if ($interacaoDoPost->dislikes > 0) {
                    $disliked = true;
                }
                if ($interacaoDoPost->likes > 0) {
                    $liked = true;
                }
            }
        }

        $comentarios = $database->selectAll('comentarios');
        $comentario_arr = array_filter($comentarios, function ($c) use ($post) {
            return (int) $c->id_post === (int) $post->id;
        });

        return view('site/pagina-individual', [
            'post' => $post,
            'usuarios' => $usuarios,
            'usuario' => $usuario,
            'likes' => $likes,
            'dislikes' => $dislikes,
            'liked' => $liked,
            'disliked' => $disliked,
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
        if ($parameters['texto'] === '') {
            header(sprintf("Location: /pagina-individual?post=%d", $_POST['id_post']));
            exit();
        }
        App::get('database')->insert('comentarios', $parameters);
        header(sprintf("Location: /pagina-individual?post={$_POST['id_post']}"));
    }
    public function onlike()
    {
        $database = App::get('database');
        $post_id = (int) $_POST['id_post'];
        $interacoes = $database->selectAll('interacoes');
        $interacaoDoPost_arr = array_filter($interacoes, function ($i) use ($post_id) {
            return (int) $i->id_post === $post_id && (int) $i->id_usuario === (int) $_SESSION['id'];
        });
        $interacaoDoPost = reset($interacaoDoPost_arr);
        if ($interacaoDoPost) {
            if ($interacaoDoPost->likes > 0) {
                $database->update('interacoes', $interacaoDoPost->id, [
                    'likes' => 0,
                ]);
            } else {
                $database->update('interacoes', $interacaoDoPost->id, [
                    'likes' => 1,
                    'dislikes' => 0,
                ], [
                    'id' => $interacaoDoPost->id,
                ]);
            }
        } else {
            $database->insert('interacoes', [
                'id_usuario' => $_SESSION['id'],
                'id_post' => $post_id,
                'likes' => 1,
                'dislikes' => 0,
                'tipo' => 0,
            ]);
        }
        header(sprintf("Location: /pagina-individual?post=%d", $post_id));
    }

    public function ondislike()
    {
        $database = App::get('database');
        $post_id = (int) $_POST['id_post'];
        $interacoes = $database->selectAll('interacoes');
        $interacaoDoPost_arr = array_filter($interacoes, function ($i) use ($post_id) {
            return (int) $i->id_post === $post_id && (int) $i->id_usuario === (int) $_SESSION['id'];
        });
        $interacaoDoPost = reset($interacaoDoPost_arr);
        if ($interacaoDoPost) {
            if ($interacaoDoPost->dislikes > 0) {
                $database->update('interacoes', $interacaoDoPost->id, [
                    'dislikes' => 0,
                ]);
            } else {
                $database->update('interacoes', $interacaoDoPost->id, [
                    'likes' => 0,
                    'dislikes' => 1,
                ], [
                    'id' => $interacaoDoPost->id,
                ]);
            }
        } else {
            $database->insert('interacoes', [
                'id_usuario' => $_SESSION['id'],
                'id_post' => $post_id,
                'likes' => 0,
                'dislikes' => 1,
                'tipo' => 0,
            ]);
        }
        header(sprintf("Location: /pagina-individual?post=%d", $post_id));
    }
}

