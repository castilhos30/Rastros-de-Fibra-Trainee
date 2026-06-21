<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../../public/css/login.css" rel="stylesheet">
    <link rel="icon" type:"image/png" href="public/assets/89dd239f299a2c3a20e35d8f32b0dced21562e55.png">
    <title>Login</title>
    <!--Boostrap icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <!--Fontes-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Oswald:wght@200..700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="login">
        <div class="login-login">
                <button class="home"><a href="/landingpage"><i class="bi bi-arrow-left"></i>Home</a></button>
            <div>
                <div class="login-logo">
                    <div class="logo-login">
                        <img src="../../../public/assets/Rato-texto.png" width="252px" height="90">
                    </div> 
                </div>
                <div class="login-caixa-texto">
                    <div class="login-introducao">
                        <div class="login-titulo">
                                <h3>Login</h3>
                        </div>
                        <div class="login-descricao">
                                <p> Entre em sua conta ou <a class="login-hover" href="/cadastro">registre-se</a></p>
                        </div>
                    </div>
                    <div class="login-inputs">
                        <form action="/login" method="post">
                            <div class="login-email">
                                <label for = "email">Informe seu email</label>
                                <div id="div-email"><i class="bi bi-envelope"></i><input maxlength="50" type="email" placeholder= "Email" name="email" required></div>
                            </div>
                            <div class="login-senha">
                                <label for = "senha">Informe sua senha</label>
                                <div id="div-senha"><i class="bi bi-lock"></i><input maxlength="255" type="password" placeholder= "Senha" id="senha" name="senha" required> <i onclick="visibilidadeSenha('senha')" class="bi bi-eye-slash" id="olho"></i></div>
                            </div>
                            <div class="login-mensagem-erro">
                                <?php
                                    if(isset($_SESSION['mensagem_erro'])) {
                                        echo '<p>' . $_SESSION['mensagem_erro'] . '</p>';
                                        unset($_SESSION['mensagem_erro']);
                                    }
                                ?>
                            </div>
                            <a class="login-hover" target="_blank" href="http://wa.link/f9y7rs">Problemas no login? Entre em contato aqui.</a>
                            <div class="login-botao">
                                <button id="login" type="submit">Login</button>
                            </div>
                        </form>
                    </div>            
                </div>
            </div>
        </div>
        <div class="visual"><img id="fundo-academia" src="../../../public/assets/fundo-academia.jpg"></div>
    </div>
    <script src="../../../public/js/login.js"></script>
</body>
</html>