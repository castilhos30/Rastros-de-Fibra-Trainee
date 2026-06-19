const imgMagroCima  = '/public/assets/Rato-supino2-magro-teste-preview.png';
const imgMagroBaixo = '/public/assets/Rato-supino1-magroesqueleto-preview.png';

const imgMedioCima  = '/public/assets/Rato-supino2-preview.png'; 
const imgMedioBaixo = '/public/assets/Rato-supino1-preview.png';

const imgForteCima  = '/public/assets/Rato-supino2-forte-preview.png'; 
const imgForteBaixo = '/public/assets/Rato-supino1-preview.png';

[imgMagroCima, imgMagroBaixo, imgMedioCima, imgMedioBaixo, imgForteCima, imgForteBaixo].forEach(src => {
    const img = new Image();
    img.src = src;
});

const musicaFundo = document.getElementById('musica-easter-egg');

let cliquesNaLogo = 0;
const logoFooter = document.querySelector('.imagemratofooter'); 
const modalJogo = document.getElementById('modal-easter-egg');

if (logoFooter) {
    logoFooter.addEventListener('click', function() {
        cliquesNaLogo++;

        if (cliquesNaLogo === 5) {
            modalJogo.style.display = 'flex';
            cliquesNaLogo = 0; 

            if(musicaFundo) {
                musicaFundo.volume = 0.1;
                musicaFundo.play();
            }
        }
    });
}

let repeticoes = 0;
const imagemRato = document.getElementById('imagem-rato-jogo');
const placar = document.getElementById('contador-reps');
const areaClique = document.querySelector('.ratinho-cenario');

function obterImagensDoNivel() {
    if (repeticoes >= 50) {
        return { cima: imgForteCima, baixo: imgForteBaixo };
    } else if (repeticoes >= 20) {
        return { cima: imgMedioCima, baixo: imgMedioBaixo };
    } else {
        return { cima: imgMagroCima, baixo: imgMagroBaixo };
    }
}

function fecharJogo() {
    modalJogo.style.display = 'none';
    repeticoes = 0;
    placar.innerText = "0 Repetições";
    imagemRato.src = imgMagroCima;
    
    if(musicaFundo) {
        musicaFundo.pause();
        musicaFundo.currentTime = 0;
    }
}

areaClique.addEventListener('mousedown', function() {
    repeticoes++;
    placar.innerText = repeticoes + " Repetições";
    const fotosAtuais = obterImagensDoNivel();
    imagemRato.src = fotosAtuais.baixo; 
});
areaClique.addEventListener('mouseup', function() {
    const fotosAtuais = obterImagensDoNivel();
    imagemRato.src = fotosAtuais.cima; 
});
areaClique.addEventListener('mouseleave', function() {
    const fotosAtuais = obterImagensDoNivel();
    imagemRato.src = fotosAtuais.cima; 
});
modalJogo.addEventListener('click', function(event) {
    if (event.target === modalJogo) {
        fecharJogo();
    }
});