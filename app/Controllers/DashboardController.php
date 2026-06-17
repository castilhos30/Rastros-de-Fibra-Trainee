<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class DashboardController
{

    public function index()
    {
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

        return view('admin/dashboard', [
            'usuarios' => $usuarios,
            'usuario' => $usuario,
            'postagens' => $postagens,
            'trendingPost' => $trendingPost,
        ]);
    }
}