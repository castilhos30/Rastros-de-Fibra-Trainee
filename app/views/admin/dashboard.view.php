<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/public/css/dashboard.css" />
    <script src="https://kit.fontawesome.com/654def639f.js" crossorigin="anonymous"></script>
    <title>Dashboard</title>
    <?php 
        $curtidasMes = [1, 3, 5, 7, 6, 5, 7, 8, 9, 10, 13, 14];
    ?>
</head>

<body> 
    <div class="espaço-sidebar"></div>
    <main class="dashboard-main">
        <div class="textomain-dashboard">
            <h1 id="title-dashboard">Dashboard</h1>
        </div>
        <div class="conteudo-dashboard">
            <div class="espaço-graficos">
                <div class="espaco-graf-usuarios">
                    <div class="icon-texto">
                        <i class="fa-solid fa-chart-line i-dash" style="color: #05ac4b"></i>
                        <p class="trending-dash-text">Curtidas por Mês</p>
                    </div>
                    <div class="grafico-principal">
                        <?php include('grafico-dash.php');?>
                    </div>
                </div>
                <div class="espaco-numeros-dash">
                    <div class="espaco-user-dash">
                        <i class="fa-solid fa-users i-uspost-dash" style="color: #05ac4b"></i>
                        <p class="dash-texts">XXX Usuários</p>
                    </div>
                    <div class="espaco-postagens-dash">
                        <i class="fa-solid fa-note-sticky i-uspost-dash" style="color: #05ac4b"></i>
                        <p class="dash-texts">XXX Postagens</p>
                    </div>
                </div>
            </div>
            <div class="espaço-analise">
                <div class="mini-sidecontrol">
                    <div class="side-title-dash">
                        <h1 class="hello-user-dash">Olá, Usuário.</h1>
                    </div>
                    <button class="botao-home-dash">
                        <i class="fa-solid fa-house" style="color: white"></i> Home
                    </button>
                    <button class="botao-sair-dash">
                        <i class="fa-solid fa-right-from-bracket" style="color: white"></i>
                        Sair
                    </button>
                </div>
                <div class="trending-posts-dash">
                    <h1 class="trending-dash-text">Trending</h1>
                </div>
            </div>
        </div>
    </main>
</body>
<script src="/public/js/dashboard.js"></script>

</html>