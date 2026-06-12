<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class UserController
{
    public function index()
    {
        //$usuarios = App::get('database')->selectAll('usuarios');
        //return view('admin/lista-usuarios', compact('usuarios'));
        $database = App::get('database');

        $limit = 6;
        $currentPage = isset($_GET['page']) ? (int) $_GET['page'] : 1;
        $pesquisa = isset($_GET['pesquisa']) ? $_GET['pesquisa'] : '';
        if ($currentPage < 1) {
            $currentPage = 1;
        }
        $offset = ($currentPage - 1) * $limit;
        $totalUsers = count($database->search('usuarios', $pesquisa, 'nome'));
        $totalPaginas = ceil($totalUsers / $limit);
        $usuarios = $database->paginate('usuarios', $limit, $offset, $pesquisa, 'nome');

        return view('admin/lista-usuarios', [
            'usuarios' => $usuarios,
            'currentPage' => $currentPage,
            'totalPaginas' => $totalPaginas,
            'pesquisa' => $pesquisa
        ]);
    }

    public function store()
    {
        $parameters = [
            'nome' => $_POST['nome'],
            'email' => $_POST['email'],
            'senha' => $_POST['senha'],
            'foto' => 'public/assets/perfil.png',
            'data' => date('Y-m-d'),
            'admin' => 0
        ];

        App::get('database')->insert('usuarios', $parameters);

        header('Location: /lista-de-usuarios');
    }

    public function edit()
    {
        $parameters = [
            'nome' => $_POST['nome'],
            'email' => $_POST['email'],
            'senha' => $_POST['senha']
        ];

        $id = $_POST['id'];
        App::get('database')->update('usuarios', $id, $parameters);
        header('Location: /lista-de-usuarios');
    }

    public function delete()
    {
        $id = $_POST['id'];
        App::get('database')->delete('usuarios', $id);
        header('Location: /lista-de-usuarios');
    }
}

