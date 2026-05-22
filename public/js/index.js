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

function funcao(){
    console.log("funcionoiu");
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
                    <img src="/public/assets/like.svg" alt=""> 0
                </li>
                <li>
                    <img src="/public/assets/dislike.svg" alt=""> 0
                </li>
                <li>
                    <img src="/public/assets/comment.svg" alt=""> 0
                </li>
                <li>
                    <img src="/public/assets/share.svg" alt=""> 0
                </li>
                </ul>
            </td>
        `;
        novoTexto += `
            <td ` + (i == 5 ? "class=td-right" : "") + `>
                <ul>
                <li>
                <button type="button" class="btn btn-visualizar" data-id="1" onclick="abrirModal('modalVisualizar')">
                    <img src="/public/assets/eye.svg" alt="">
                </button>
                </li>
                <li>
                <button type="button" class="btn btn-editar" data-id="1" onclick="abrirModal('modalEditar')">
                    <img src="/public/assets/pencil.svg" alt="">
                </button>
                </li>
                <li>
                <button type="button" class="btn btn-visualizar" data-id="1">
                    <img src="/public/assets/trash.svg" alt="">
                </button>
                </li>
                </ul>
            </td>
        `;
        novoTexto += "</tr>";
    }
    tabelaPostsBody.innerHTML = novoTexto;
}