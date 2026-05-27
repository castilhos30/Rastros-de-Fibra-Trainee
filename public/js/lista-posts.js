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

// Apenas pra resetar a tabela, sem precisar de copiar e colar no html
resetarTabela();
function resetarTabela() {
    let tabelaPostsBody = document.getElementById("tabelapostsbody");
    tabelaPostsBody.innerHTML = "";
    let novoTexto = "";
    for (let i = 1; i <= 5; i++) {
        novoTexto += "<tr>";
        novoTexto += "<td " + (i == 5 ? "class=td-left" : "") + ">" + i + "</td>";
        novoTexto += "<td>xx/xx/xxxx</td>";
        novoTexto += "<td>aaaaaaaaaaaa</td>";
        novoTexto += "<td>Heitor Tetzner Pereira</td>";
        novoTexto += `
            <td>
                <ul>
                <li>
                    <i class="fa-regular fa-thumbs-up"></i>
                    0
                </li>
                <li>
                    <i class="fa-regular fa-thumbs-down"></i>
                    0
                </li>
                <li>
                    <i class="fa-regular fa-comment"></i>
                    0
                </li>
                <li>
                    <i class="fa-regular fa-share-from-square"></i>
                    0
                </li>
                </ul>
            </td>
        `;
        novoTexto += `
            <td ` + (i == 5 ? "class=td-right" : "") + `>
                <ul>
                <li>
                    <button type="button" class="btn btn-visualizar" data-id="1" onclick="abrirModal('modalVisualizar')">
                    <i class="fa-regular fa-eye" style="color:white;"></i>
                </button>
                </li>
                <li>
                    <button type="button" class="btn btn-editar" data-id="1" onclick="abrirModal('modalEditar')">
                    <i class="fa-regular fa-pen-to-square" style="color:white;"></i>
                </button>
                </li>
                <li>
                    <button type="button" class="btn btn-excluir" data-id="1" onclick="abrirModal('modalExcluir')">
                    <i class="fa-regular fa-trash-can" style="color:white;"></i>
                </button>
                </li>
                </ul>
            </td>
        `;
        novoTexto += "</tr>";
    }
    tabelaPostsBody.innerHTML = novoTexto;
}