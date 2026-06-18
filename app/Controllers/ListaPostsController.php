<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class ListaPostsController
{
    public function index()
    {
        $database = App::get('database');

        $limit = 5;
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
        $interacoes = $database->selectAll('interacoes');
        $comentarios = $database->selectAll('comentarios');

        $idUsuarioLogado = isset($_SESSION["id"]);
        $postsDoUsuario_arr = array_filter($posts, function($p) use ($idUsuarioLogado) {
            return (int) $idUsuarioLogado === (int) $p->id_usuario;
        }) ;
        if($_SESSION['admin']==1){
            $postsDoUsuario_arr = $posts;
        }
        return view('admin/lista-de-posts', [
            'posts' => $posts,
            'currentPage' => $currentPage,
            'totalPaginas' => $totalPaginas,
            'pesquisa' => $pesquisa,
            'interacoes' => $interacoes,
            'comentarios' => $comentarios,
            'postsDoUsuario_arr' => $postsDoUsuario_arr,
        ]);
    }
    



    public function store()
    {
        $temporario = $_FILES['imagem']['tmp_name'];
        $nomeImagem = sha1(uniqid($_FILES['imagem']['name'], true)) . '.' . pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION);
        $caminhoImagem = "public/assets/imagensPosts/" . $nomeImagem;
        move_uploaded_file($temporario, $caminhoImagem);
        $usuario = App::get('database')->selectOne('usuarios', $_SESSION['id']);
        $parameters = [
            'titulo' => $_POST['titulo'],
            'descricao' => $_POST['descricao'],
            'criador' => $usuario->nome,
            'foto' => $caminhoImagem,
            'data' => date('Y-m-d H:i:s'),
            'id_usuario' => $_SESSION['id']
        ];
        App::get('database')->insert('posts', $parameters);
        header('Location: /lista-de-posts');
        exit();
    }

    public function delete()
    {
        $id = $_POST['id'];

        App::get('database')->delete('posts', $id);

        header('Location: /lista-de-posts');
    }
    public function edit()
    {
        $id = $_POST['id'];
        $post = App::get('database')->selectOne('posts', $id);
        $caminhoImagem = $post->foto;

        if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
            $temporario = $_FILES['imagem']['tmp_name'];
            $nomeImagem = sha1(uniqid($_FILES['imagem']['name'], true)) . '.' . pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION);
            $caminhoImagem = "public/assets/imagensPosts/" . $nomeImagem;
            move_uploaded_file($temporario, $caminhoImagem);

            if ($post && !empty($post->foto) && file_exists($post->foto)) {
                unlink($post->foto);
            }
        }

        $parameters = [
            'titulo' => $_POST['titulo'],
            'descricao' => $_POST['descricao'],
            'foto' => $caminhoImagem,
        ];
        $id = $_POST['id'];
        App::get('database')->update('posts', $id, $parameters);
        header('Location: /lista-de-posts');
    }


}