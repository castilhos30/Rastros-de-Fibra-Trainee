const filtro = document.querySelector('#filtro');

function abrirModal(idModal) {
    const modal = document.getElementById(idModal);

    if (!modal || !filtro) {
        return;
    }

    modal.style.display = "flex";
    filtro.style.display = "flex";
}

function fecharModal(idModal) {
    const modal = document.getElementById(idModal);
    if (!modal || !filtro) {
        return;
    }

    modal.style.display = "none";
    filtro.style.display = "none";
}

function mudarIdModalExcluir(id) {
    const inputId = document.getElementById('modalExcluirId');

    if (!inputId) {
        return;
    }

    inputId.value = id;
}
document.addEventListener('keydown', function(event) {
    if (event.key === "Escape") {
    const modais = document.querySelectorAll('.lista-posts-modal');
    modais.forEach(function(modal) {
        modal.style.display = "none"; 
    });
        filtro.style.display = "none";
    }
})

document.addEventListener('click', function(event) {
    if(event.target === filtro) {
        const modais = document.querySelectorAll('.lista-posts-modal');
        modais.forEach(function(modal) {
            modal.style.display = "none"; 
        });
        filtro.style.display = "none";
    }
})
