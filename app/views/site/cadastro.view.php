<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../../public/css/login.css" rel="stylesheet">
    <link rel="icon" type:"image/png" href="public/assets/89dd239f299a2c3a20e35d8f32b0dced21562e55.png">
    <title>Cadastro</title>
    <!--Boostrap icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <!--Fontes-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Oswald:wght@200..700&display=swap"
        rel="stylesheet">
</head>

<body>
    <div class="login">
        <div class="login-login">
            <button class="home"><a href="/landingpage"><i class="bi bi-arrow-left"></i>Home</a></button>
            <div class="scroll">
                <div class="login-logo">
                    <div class="logo-login">
                        <img src="../../../public/assets/Rato-texto.png" width="252px" height="90">
                    </div>
                </div>
                <div class="login-caixa-texto">
                    <div class="login-introducao">
                        <div class="login-titulo">
                            <h3>Registro</h3>
                        </div>
                        <div class="login-descricao">
                            <p> Crie sua conta ou <a class="login-hover" href="/login">faça login.</a></p>
                        </div>
                    </div>
                    <div class="login-inputs">
                        <form action="/cadastro" method="post" enctype="multipart/form-data">
                            <div class="login-email">
                                <label for="email">Informe seu nome de usuário.</label>
                                <div id="div-email"><i class="bi bi-person"></i><input maxlength="50" type="text"
                                        placeholder="Nome de usuário" name="username" required></div>
                            </div>
                            <div class="login-email">
                                <label for="email">Informe seu email</label>
                                <div id="div-email"><i class="bi bi-envelope"></i><input maxlength="50" type="email"
                                        placeholder="Email" name="email" required></div>
                            </div>
                            <div class="login-senha">
                                <label for="senha">Informe sua senha</label>
                                <div id="div-senha"><i class="bi bi-lock"></i><input maxlength="255" type="password"
                                        placeholder="Senha" name="senha" id="senha" required> <i
                                        onclick="visibilidadeSenha('senha')" id="olho" class="bi bi-eye-slash"></i>
                                </div>
                            </div>
                            <div class="lista-posts-identificacao">
                                <label>Selecione sua foto de perfil (opcional).</label>
                                <input type="file" name="imagem" accept="image/*" class="input imagem" id="imagem"
                                    value="
                                public\assets\icon-user.png
                                ">
                                <label for="imagem" class="lista-posts-label">
                                    <img class='lista-posts-imagem' data-src-original="public\assets\pfp.png"
                                        src="public\assets\icon-user.png" alt="Imagem de perfil" />
                                </label>
                            </div>
                            <div class="login-mensagem-erro">
                                <?php
                                if (isset($_SESSION['mensagem_erro'])) {
                                    echo '<p>' . $_SESSION['mensagem_erro'] . '</p>';
                                    unset($_SESSION['mensagem_erro']);
                                }
                                ?>
                            </div>
                            <a class="login-hover" target="_blank" href="http://wa.link/5efqj4">Problemas no registro?
                                Entre em contato aqui.</a>
                            <div class="login-botao">
                                <button id="login" type="submit">Registre-se</button>
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