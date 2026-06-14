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
            session_start();
            $_SESSION['id']= $user->id;
            header('Location: /pagina-posts');
            exit();
        } else{

            session_start();
            $_SESSION['mensagem_erro'] = 'Email ou senha incorretos';
            header('Location: /login');
        }
    }
}