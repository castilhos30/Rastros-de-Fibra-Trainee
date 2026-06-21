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

    const input = modal.querySelector('input[type="file"]');
    if (input) {
        input.value = "";
    }
    const img = modal.querySelector('.lista-posts-imagem');
    if (img && img.dataset.srcOriginal) {
        img.src = img.dataset.srcOriginal;
    }
}

function mudarIdModalExcluir(id) {
    const inputId = document.getElementById('modalExcluirId');

    if (!inputId) {
        return;
    }

    inputId.value = id;
}
document.addEventListener('keydown', function (event) {
    if (event.key === "Escape") {
        const modais = document.querySelectorAll('.lista-posts-modal');
        modais.forEach(function (modal) {
            modal.style.display = "none";
            filtro.style.display = "none";

            const input = modal.querySelector('input[type="file"]');
            if (input) {
                input.value = "";
            }
            const img = modal.querySelector('.lista-posts-imagem');
            if (img && img.dataset.srcOriginal) {
                img.src = img.dataset.srcOriginal;
            }
        });
    }
})

document.addEventListener('click', function (event) {
    if (event.target === filtro) {
        const modais = document.querySelectorAll('.lista-posts-modal');
        modais.forEach(function (modal) {
            modal.style.display = "none";
            filtro.style.display = "none";
            const input = modal.querySelector('input[type="file"]');
            if (input) {
                input.value = "";
            }
            const img = modal.querySelector('.lista-posts-imagem');
            if (img && img.dataset.srcOriginal) {
                img.src = img.dataset.srcOriginal;
            }
        });
    }
})

document.onchange = function (event) {
    if (event.target.type === 'file') {
        const imagem = event.target.files[0];

        if (imagem) {
            const container = event.target.closest('.lista-posts-identificacao');
            const previewImagem = container.querySelector('.lista-posts-imagem');
            if (previewImagem) {
                previewImagem.src = URL.createObjectURL(imagem);
            }
        }
    }
}

const parametrosUrl = new URLSearchParams(window.location.search);

if (parametrosUrl.get('erro') === 'postvazio') {
    alert('Erro: Nenhum campo pode estar vazio.');
    window.history.replaceState(null, null, window.location.pathname);
}