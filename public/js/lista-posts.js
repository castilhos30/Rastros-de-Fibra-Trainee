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

limparTabela();
function limparTabela() {
    let tabelaPostsBody = document.getElementById("tabelapostsbody");
    tabelaPostsBody.innerHTML = "";
}

function novaLinhaTabela(id, data, titulo, autor) {
    let tabelaPostsBody = document.getElementById("tabelapostsbody");
    let novoTexto = "";
    novoTexto += "<tr>";
    novoTexto += "<td>" + id + "</td>";
    novoTexto += "<td>" + data + "</td>";
    novoTexto += "<td>" + titulo + "</td>";
    novoTexto += "<td>" + autor + "</td>";
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
            <td>
                <ul>
                <li>
                    <button type="button" class="btn btn-visualizar" data-id="${id}" onclick="abrirModal('modalVisualizar')">
                    <i class="fa-regular fa-eye" style="color:white;"></i>
                </button>
                </li>
                <li>
                    <button type="button" class="btn btn-editar" data-id="${id}" onclick="abrirModal('modalEditar')">
                    <i class="fa-regular fa-pen-to-square" style="color:white;"></i>
                </button>
                </li>
                <li>
                    <button type="button" class="btn btn-excluir" data-id="${id}" onclick="abrirModal('modalExcluir')">
                    <i class="fa-regular fa-trash-can" style="color:white;"></i>
                </button>
                </li>
                </ul>
            </td>
        `;
    novoTexto += "</tr>";
    tabelaPostsBody.innerHTML += novoTexto;
}