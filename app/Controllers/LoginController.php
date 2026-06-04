<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class LoginController
{
    public function exibirLogin()
    {
        return view('site/login');
    }

    public function efetuaLogin(){
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $user = App::get('database')->verificaLogin(
            $email,
            $senha
        );

        if ($user != false){
            session_start();
            $_SESSION['id'] = $user->id;
            header('Location: /landingpage');
            exit();
        } else {
            session_start();
            $_SESSION['mensagem-erro'] = "Usuário ou Senha Incorretos!";
            header('Location: /login');
        }
    }
}