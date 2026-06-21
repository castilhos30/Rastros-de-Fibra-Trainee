<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rastros de Fibra</title>
    <link rel="stylesheet" href="../../../public/css/landingpage.css"> 
    <link rel="icon" type:"image/png" href="public/assets/89dd239f299a2c3a20e35d8f32b0dced21562e55.png">
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Archivo+Black&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');
</style>

<body>
    <?php require 'navbar.view.php' ?>
    <main>
        <div class="landingpage">
            <div class="hero">
                <div class="textoslanding">
                    <h1 class="maintitulo">Sua evolução<br>começa aqui.</h1>
                    <p class="maindesc">Registre seu caminho. <br>Viva o Rastros de Fibra. </p>
                    <div class="botaolermais">
                        <a href='/pagina-de-posts'>
                        <button class="lermais">Ler mais</button>
                        </a>
                    </div>
                </div>
            </div>

            <div class="titulo-post-recentes">
                <h1>Postagens Recentes</h1>
            </div>

            <div class="carrossel-landing">
                <div class="slider">
                    <div class="slides">
                        <?php $numPosts = count($posts); ?>
                        <?php for ($i = 1; $i <= $numPosts; $i++): ?>
                            <input type="radio" name="radio-btn" id="radio<?= $i ?>">

                        <?php endfor; ?>

                        <?php $i = 1;
                        foreach ($posts as $post): ?>
                            <?php
                            $criadorPost = array_filter($usuarios, static function ($u) use ($post) {
                                return $u->id == $post->id_usuario;
                            });
                            $criadorPost = reset($criadorPost);
                            ?>

                            <a class="slide <?= $i === 1 ? 'first' : '' ?>" href="pagina-individual?post=<?= $post->id ?>">
                                <img src=" <?= $post->foto ?>">
                                <div class="slide-info">
                                    <h3 class="slide-title"><?= htmlspecialchars($post->titulo) ?></h3>
                                    <span class="slide-author">Por
                                        <?= htmlspecialchars($criadorPost->nome ?? 'Usuário não encontrado') ?></span>
                                </div>
                            </a>

                            <?php $i++; ?>
                        <?php endforeach; ?>

                        <!--nav-->
                        <div class="navigation-auto">
                            <?php for ($j = 1; $j <= $numPosts; $j++): ?>
                                <div class="auto-btn<?= $j ?>"></div>
                            <?php endfor; ?>
                        </div>
                        <!--fim nav-->
                    </div>


                    <div class="manual-navigation">
                        <?php for ($j = 1; $j <= $numPosts; $j++): ?>
                            <label for="radio<?= $j ?>" class="manual-btn"></label>
                        <?php endfor; ?>
                    </div>

                </div>
            </div>
            <div class="sobre-nos-landing">
                <div class="textos-sobrenos-landing">
                    <h1 class="sobrenos">Sobre Nós</h1>
                    <p class="sobrenos-texto">A "Rastros de Fibra" é mais que um blog: 
                        é uma comunidade para quem sabe que treinar vai além de levantar peso. 
                        Celebramos cada evolução, da consistência diária à superação de limites. 
                        Junte-se a nós para compartilhar histórias onde cada repetição conta e o 
                        chão da academia nos ensina a vencer.</p>
                </div>
            </div>
        </div>
    </main>
    <script src="../../../public/js/landingpage.js"></script>
    <?php require 'footer.view.php' ?>
</body>

</html>