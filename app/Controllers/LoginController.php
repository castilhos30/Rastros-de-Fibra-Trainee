<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class LoginController
{

    public function efetuaLogin()
    {
        $email =$_POST['email'];
        $senha = $_POST['senha'];

        $user = App::get('database') -> verificaLogin(
            $email,
            $senha
        );
        if($user != false)
        {

            $_SESSION['id']= $user->id;
            header('Location: /pagina-de-posts');
            exit();
        } else{


            $_SESSION['mensagem_erro'] = 'Email ou senha incorretos';
            header('Location: /login');
        }
    }
    public function exibirLogin(){
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
        $username = $_POST['username'];
        $email =$_POST['email'];
        $senha = $_POST['senha'];

        try {
            App::get('database')->criarUsuario($username, $email, $senha);
            header('Location: /pagina-de-posts');
            exit();
        } catch (Exception $e) {
            $_SESSION['mensagem_erro'] = 'Erro ao criar usuário: ' . $e->getMessage();
            header('Location: /cadastro');
            exit();
        }
    }
}
