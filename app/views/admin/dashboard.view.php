<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/public/css/dashboard.css" />
    <script src="https://kit.fontawesome.com/654def639f.js" crossorigin="anonymous"></script>
    <title>Dashboard</title>
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
                        <p class="titulo-grafico">Curtidas por Mês</p>
                    </div>
                    <div class="grafico-principal">
                        <?php include('grafico-dash.php'); ?>
                    </div>
                </div>
                <div class="espaco-numeros-dash">
                    <div class="espaco-user-dash">
                        <i class="fa-solid fa-users i-uspost-dash" style="color: #05ac4b"></i>
                        <p class="dash-texts"><?= count($usuarios) ?> Usuários</p>
                    </div>
                    <div class="espaco-postagens-dash">
                        <i class="fa-solid fa-note-sticky i-uspost-dash" style="color: #05ac4b"></i>
                        <p class="dash-texts">
                            <?= count($postagens) ?> Postagens
                        </p>
                    </div>
                </div>
            </div>
            <div class="espaço-analise">
                <div class="mini-sidecontrol">
                    <div class="side-title-dash">
                        <h1 class="hello-user-dash">Olá, <?= $usuario->nome ?>.</h1>
                    </div>
                    <a href="landingpage" class="botao-home-dash">
                        <i class="fa-solid fa-house" style="color: white"></i> Home
                    </a>
                    <a href="logout" class="botao-sair-dash">
                        <i class="fa-solid fa-right-from-bracket" style="color: white"></i>
                        Sair
                    </a>
                </div>
                <div class="trending-posts-dash">
                    <h1 class="trending-dash-text">Trending</h1>
                    <a href="/pagina-individual?post=<?= $trendingPost->id ?>" class="card">
                        <img class="posts-imagem" width="330px" height="266px" alt="foto do post"
                            src="<?= $trendingPost->foto ?>">
                        <div class="posts-interacoes">
                            <i class="fa-regular fa-thumbs-up cursor-pointer"></i>
                            <span class="inter-span">
                                <?= $likes ?>
                            </span>
                            <i class="fa-regular fa-thumbs-down cursor-pointer"></i>
                            <span class="inter-span">
                                <?= $dislikes ?>
                            </span>
                            <i class="fa-regular fa-comment cursor-pointer"> </i>
                            <span class="inter-span">
                                <?= $comentarios ? count($comentarios) : 0 ?>
                            </span>
                        </div>
                        <div class="posts-textos">
                            <p class="posts-titulo">
                                <?= $trendingPost->titulo ?>
                            </p>
                        </div>
                    </a>
                </div>
            </div>
    </main>
</body>
<script src="/public/js/dashboard.js"></script>

</html>