<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rastros de Fibra</title>
    <link rel="stylesheet" href="../../../public/css/landingpage.css">
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Archivo+Black&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');
</style>

<body>
    <header>
    </header>
    <main>
        <div class="landingpage">
            <div class="hero">
                <div class="textoslanding">
                    <h1 class="maintitulo">Sua evolução<br>começa aqui.</h1>
                    <p class="maindesc">Registre seu caminho. <br>Viva o Rastros de Fibra. </p>
                    <div class="botaolermais">
                        <button class="lermais">Ler mais</button>
                    </div>
                </div>
            </div>
            
            <div class="titulo-post-recentes">
                <h1>Postagens Recentes</h1>
            </div>
            
            <div class="carrossel-landing">
                <div class="slider">
                    <div class="slides">
                        <?php foreach ($posts as $post) : ?>
                        <img src="<? $post->foto ?>">
                        <?php endforeach; ?>
                        
                        <input type="radio" name="radio-btn" id="radio1">
                        <input type="radio" name="radio-btn" id="radio2">
                        <input type="radio" name="radio-btn" id="radio3">
                        <input type="radio" name="radio-btn" id="radio4">

                        <!--imgs-->
                        
                            <div class="slide-info">
                                <h3 class="slide-title">Título Post</h3>
                                <span class="slide-author">Por Autor do Post</span>
                            </div>
                        
                        <!--fim imgs-->
                        <!--nav-->
                        <div class="navigation-auto">
                            <div class="auto-btn1"></div>
                            <div class="auto-btn2"></div>
                            <div class="auto-btn3"></div>
                            <div class="auto-btn4"></div>
                        </div>
                        <!--fim nav-->
                    </div>

                    <div class="manual-navigation">
                        <label for="radio1" class="manual-btn"></label>
                        <label for="radio2" class="manual-btn"></label>
                        <label for="radio3" class="manual-btn"></label>
                        <label for="radio4" class="manual-btn"></label>
                    </div>
                </div>
            </div>
            <div class="sobre-nos-landing">
                <div class="textos-sobrenos-landing">
                    <h1 class="sobrenos">Sobre Nós</h1>
                    <p class="sobrenos-texto">A "Rastros de Fibra" é mais do que um blog; é uma comunidade para quem entende que o treino não é apenas levantar peso. Nosso objetivo é capturar e compartilhar a paixão por cada evolução, seja na consistência da rotina diária ou na superação de um limite pessoal. Queremos dar voz a essas histórias, mostrando que cada repetição conta e que a relação entre o praticante e o ferro é cheia de significado. Junte-se a nós para celebrar a arte da musculação, revelar o que o chão da academia nos ensina e explorar as conquistas inesquecíveis que construímos a cada série concluída.</p>
                </div>
            </div>
        </div>
    </main>
    <script src="../../../public/js/landingpage.js"></script>
</body>

</html>