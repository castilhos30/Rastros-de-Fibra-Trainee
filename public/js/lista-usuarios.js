const filtro = document.querySelector('#filtro');

function abrirModal(idModal) {
    const modal = document.getElementById(idModal);
    modal.style.display = "flex";
    filtro.style.display = "flex";
}

function fecharModal(idModal) {
    const modal = document.getElementById(idModal);
    modal.style.display = "none";
    filtro.style.display = "none";
}

/*
resetaTabela();
function resetaTabela() {
    const tabelaBody = document.getElementById("tabelaBody");
    let novoTexto = "";
    for (let i = 1; i <= 5; i++) {
        novoTexto += `
    <tr>
                    <td>${i}</td>
                    <td>Guilherme Perissé</td>
                    <td>perisse@email.com</td>
                    <td>
                        <div class="iconestabela">
                            <button type="button" class="btn-acao btn-visualizar"
                                onclick="abrirModal('modalvisualizar')" data-id="${i}">
                                <i class="fa-regular fa-eye"></i>
                            </button>
                                <button type="button" class="btn-acao btn-editar"
                                onclick="abrirModal('modaleditar')" data-id="${i}">
                                <i class="fa-regular fa-pen-to-square"></i>
                            </button>
                            <button type="button" class="btn-acao btn-excluir" onclick="abrirModal('modalexcluir')" data-id="${i}">
                                <i class="fa-regular fa-trash-can"></i>
                            </button>
                        </div>
                    </td>
                </tr>
    `;
    }
    tabelaBody.innerHTML = novoTexto;
}
*/
