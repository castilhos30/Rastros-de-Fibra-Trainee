<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class PaginaPostsController
{
    public function index()
    {
        checkLogin();
        $database = App::get('database');

        $limit = 6;
        $currentPage = isset($_GET['page']) ? (int) $_GET['page'] : 1;
        $pesquisa = isset($_GET['pesquisa']) ? $_GET['pesquisa'] : '';
        if ($currentPage < 1) {
            $currentPage = 1;
        }
        $offset = ($currentPage - 1) * $limit;
        $totalPosts = count($database->search('posts', $pesquisa, 'titulo'));
        $totalPaginas = ceil($totalPosts / $limit);
        $posts = $database->paginate('posts', $limit, $offset, $pesquisa, 'titulo');
        //var_dump($totalPosts);
        $usuarios = $database->selectAll('usuarios');
        $interacoes = $database->selectAll('interacoes');
        $comentarios = $database->selectAll('comentarios');

        return view('site/pagina-posts', [
            'posts' => $posts,
            'currentPage' => $currentPage,
            'totalPaginas' => $totalPaginas,
            'pesquisa' => $pesquisa,
            'usuarios' => $usuarios,
            'interacoes' => $interacoes,
            'comentarios' => $comentarios,
        ]);
    }
}

?>