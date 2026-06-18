<?php

namespace App\Controllers;

use App\Core\App;
use DateTime;
use Exception;

class DashboardController
{

    public function index()
    {
        checkLogin();
        $database = App::get('database');

        $usuarios = $database->selectAll('usuarios');
        $usuario = array_filter($usuarios, function ($u) {
            return (int) $u->id === (int) $_SESSION['id'];
        });
        $usuario = reset($usuario);

        $postagens = $database->selectAll('posts');

        $trendingPost = null;

        $interacoes = $database->selectAll('interacoes');
        $posts_x_likes = [];
        foreach ($interacoes as $interacao) {
            $post = array_filter($postagens, function ($p) use ($interacao) {
                return (int) $p->id === (int) $interacao->id_post;
            });
            $post = reset($post);
            if (!$post) {
                continue;
            }

            $posts_x_likes[$post->id] = ($posts_x_likes[$post->id] ?? 0) + $interacao->likes;

        }
        if (!empty($posts_x_likes)) {
            $trendingPostId = array_keys($posts_x_likes, max($posts_x_likes));
            $trendingPostId = reset($trendingPostId);

            $trendingPost = array_filter($postagens, function ($p) use ($trendingPostId) {
                return (int) $p->id === (int) $trendingPostId;
            });
            $trendingPost = reset($trendingPost);
        }

        $curtidasMes = [];
        foreach ($interacoes as $interacao) {
            $date = new DateTime($interacao->data);
            $month = (int) $date->format('m');
            $month--;
            $curtidasMes[$month] = ($curtidasMes[$month] ?? 0) + $interacao->likes;
        }

        $likes = 0;
        $dislikes = 0;
        $interacaoDoPost_arr = array_filter($interacoes, function ($i) use ($trendingPost) {
            return (int) $i->id_post === (int) $trendingPost->id;
        });
        foreach ($interacaoDoPost_arr as $interacaoDoPost) {
            $likes += $interacaoDoPost->likes;
            $dislikes += $interacaoDoPost->dislikes;
        }

        $comentarios = $database->selectAll('comentarios');
        $comentario_arr = array_filter($comentarios, function ($c) use ($trendingPost) {
            return (int) $c->id_post === (int) $trendingPost->id;
        });

        return view('admin/dashboard', [
            'usuarios' => $usuarios,
            'usuario' => $usuario,
            'postagens' => $postagens,
            'trendingPost' => $trendingPost,
            'curtidasMes' => $curtidasMes,
            'likes' => $likes,
            'dislikes' => $dislikes,
            'comentarios' => $comentario_arr,
        ]);
    }
}