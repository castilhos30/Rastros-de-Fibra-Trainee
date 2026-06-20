<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer</title>
    <link rel="stylesheet" href="../../../public/css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <footer>
    <div class="cimafooter">
        <div class="redessociaisfooter">
            <h1 class="textoredessociais">Redes Sociais</h1>
            <div class="iconesredessociaisfooter">
                <i class="fa-brands fa-whatsapp"></i>
                <i class="fa-brands fa-instagram"></i>
                <i class="fa-brands fa-facebook"></i>
                <i class="fa-brands fa-linkedin"></i>
                <i class="fa-brands fa-x-twitter"></i>
                
            </div>
        </div>
        <img class="imagemratofooter" src="/public/assets/Rato-texto.png">
        <a href="https://www.codejr.com.br/" target="_blank">
        <div class="criadordapagina">
            <p class="desenvolvido"> Desenvolvido por:</p>
            <img class="imagemlogofooter" src="/public/assets/logocodefooter.png">
        </div>
        </a>
    </div>
    <div class="linhafooter"></div>
    <div class="baixofooter">
        <div class="mvvfooter">
            <h1>Missão</h1>
            <p>Dar voz à jornada da musculação e celebrar cada evolução. Inspirar e conectar praticantes através de histórias reais, mostrando que o treino vai além do físico — é uma arte diária de superação, consistência e aprendizado no chão da academia.</p>
        </div>
        <div class="mvvfooter">
            <h1>Visão</h1>
            <p>Ser a principal comunidade e referência de conteúdo sobre o estilo de vida da musculação com propósito. Queremos ser reconhecidos como o espaço onde a paixão pelo ferro e o desenvolvimento pessoal se encontram, unindo pessoas que enxergam significado em cada repetição.</p>
        </div>
        <div class="mvvfooter">
            <h1>Valores</h1>
            <p>Comunidade e Conexão: Acreditamos que ninguém treina sozinho. Valorizamos a troca de experiências e o apoio mútuo entre aqueles que compartilham a mesma paixão. Consistência e Disciplina: O resultado é fruto do trabalho diário. Valorizamos o processo, a rotina e o compromisso com a própria evolução. Superação Pessoal: Mais do que vencer os outros, buscamos superar nossos próprios limites. Cada repetição e cada série concluída importam.</p>
        </div>
    </div>
    <div class="linhafooterbaixo"></div>
    <div class="divbaixocelular">
        
        <div class="redessociaisfootercelular">
            <h1 class="textoredessociais">Redes Sociais</h1>
            <div class="iconesredessociaisfooter">
                <i class="fa-brands fa-whatsapp"></i>
                <i class="fa-brands fa-instagram"></i>
                <i class="fa-brands fa-facebook"></i>
                <i class="fa-brands fa-linkedin"></i>
                <i class="fa-brands fa-x-twitter"></i>               
            </div>
        </div><a href="https://www.codejr.com.br/" target="_blank">
        <div class="criadordapaginacelular">
            <p class="desenvolvido"> Desenvolvido por:</p>
            <img class="imagemlogofooter" src="/public/assets/logocodefooter.png">
        </div>
        </a>
    </div>   
    <div id="modal-easter-egg" class="modal-easter-egg" style="display: none;">
        <div class="conteudo-jogo">
            
            <div class="divfecharrato"> <button class="fechar-jogo" onclick="fecharJogo()">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <div class="placar">
                <h1>Projeto BBzinho</h1>
                <h2 id="contador-reps">0 Repetições</h2>
            </div>

            <div class="ratinho-cenario">
                <img 
                    src="/public/assets/Rato-supino2-magro-teste-preview.png" 
                    alt="Ratinho Supinando" 
                    class="rato-img" 
                    id="imagem-rato-jogo"
                    draggable="false"
                >
            </div>
        </div>
    </div>
    <audio id="musica-easter-egg" src="/public/assets/back-to-black.mp3" loop></audio>
    <script src="/public/js/footer.js"></script> 
    </footer>
</body>
</html>