const imgCima = '/public/assets/Rato-supino2.png'; 
const imgBaixo = '/public/assets/Rato-supino1.png'; 
const musicaFundo = document.getElementById('musica-easter-egg');

const preloadCima = new Image();
preloadCima.src = imgCima;

const preloadBaixo = new Image();
preloadBaixo.src = imgBaixo;

let cliquesNaLogo = 0;
const logoFooter = document.querySelector('.imagemratofooter'); 
const modalJogo = document.getElementById('modal-easter-egg');

if (logoFooter) {
    logoFooter.addEventListener('click', function() {
        cliquesNaLogo++;

        if (cliquesNaLogo === 5) {
            modalJogo.style.display = 'flex';
            cliquesNaLogo = 0; 

            musicaFundo.volume = 0.5; 
            musicaFundo.play();
        }
    });
}

let repeticoes = 0;
const imagemRato = document.getElementById('imagem-rato-jogo');
const placar = document.getElementById('contador-reps');
const areaClique = document.querySelector('.ratinho-cenario');

function fecharJogo() {
    modalJogo.style.display = 'none';
    repeticoes = 0;
    placar.innerText = "0 Repetições";
    imagemRato.src = imgCima;

    musicaFundo.pause();
    musicaFundo.currentTime = 0;
}
areaClique.addEventListener('mousedown', function() {
    imagemRato.src = imgBaixo;
    repeticoes++;
    placar.innerText = repeticoes + " Repetições";
});

areaClique.addEventListener('mouseup', function() {
    imagemRato.src = imgCima;
});
areaClique.addEventListener('mouseleave', function() {
    imagemRato.src = imgCima;
});

modalJogo.addEventListener('click', function(event) {
    if (event.target === modalJogo) {
        fecharJogo();
    }
});