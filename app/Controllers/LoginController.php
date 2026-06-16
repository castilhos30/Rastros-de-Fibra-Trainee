<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class LoginController
{

    public function efetuaLogin()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $user = App::get('database')->verificaLogin(
            $email,
            $senha
        );
        if ($user != false) {
            $_SESSION['id'] = $user->id;
            $_SESSION['nome'] = $user->nome;
            $_SESSION['foto'] = $user->foto;
            header('Location: /lista-de-posts');
            exit();
        } else {


            $_SESSION['mensagem_erro'] = 'Email ou senha incorretos';
            header('Location: /login');
        }
    }
    public function exibirLogin()
    {
        return view('site/login');
    }
    public function Logout()
    {
        session_destroy();
        header('Location: /login');
        exit();
    }

    public function exibirCadastro()
    {
        return view('site/cadastro');
    }
    public function efetuaCadastro()
    {
        $emailDigitado = $_POST['email'];
        $todosUsuarios = App::get('database')->selectAll('usuarios');
        $emailJaExiste = false;

        foreach ($todosUsuarios as $usuario) {
            if ($usuario->email === $emailDigitado) {
                $emailJaExiste = true;
                break;
            }
        }
        if ($emailJaExiste) {
            $_SESSION['mensagem_erro'] = 'Email já cadastrado, tente fazer login ou use outro email.';
            header('Location: /cadastro');
            exit();
        }

        $caminhoFoto = 'public/assets/icon-user.png';
        if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
            $temporario = $_FILES['imagem']['tmp_name'];
            $extensao = pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION);
            $nomeUnico = sha1(uniqid($_FILES['imagem']['name'], true)) . '.' . $extensao;
            $caminhoFoto = 'public/assets/' . $nomeUnico;
            move_uploaded_file($temporario, $caminhoFoto);
        }

        $parameters = [
            'nome' => $_POST['username'],
            'email' => $emailDigitado,
            'senha' => $_POST['senha'],
            'foto' => $caminhoFoto,
            'data' => date('Y-m-d'),
            'admin' => 0
        ];

        App::get('database')->insert('usuarios', $parameters);

        header('Location: /');
        exit();
    }
}