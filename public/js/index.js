const filtro = document.querySelector('#filtro');

function abrirModal(idModal) {
    const modal = document.getElementById(idModal);
    modal.style.display = "flex";
    filtro.style.display = "flex";
}

function fecharModal(idModal){
    const modal = document.getElementById(idModal);
    modal.style.display = "none";
    filtro.style.display = "none";
}