// Apenas pra resetar a tabela, sem precisar de copiar e colar no html
resetarTabela();
function resetarTabela() {
    let tabelaPostsBody = document.getElementById("tabelapostsbody");
    tabelaPostsBody.innerHTML = "";
    let novoTexto = "";
    for (let i = 1; i <= 5; i++) {
        novoTexto += "<tr>";
        novoTexto += "<td>" + i + "</td>";
        novoTexto += "<td>xx/xx/xxxx</td>";
        novoTexto += "<td>aaaaaaaaaaaa</td>";
        novoTexto += "<td>Guilherme Gonçalves Perissé</td>";
        novoTexto += `
            <td>
                <ul>
                <li>
                    <img src="/public/assets/like.svg" alt="">
                </li>
                <li>
                    <img src="/public/assets/dislike.svg" alt="">
                </li>
                <li>
                    <img src="/public/assets/comment.svg" alt="">
                </li>
                <li>
                    <img src="/public/assets/share.svg" alt="">
                </li>
                </ul>
            </td>
        `;
        novoTexto += `
            <td>
                <ul>
                <li>
                    <img src="/public/assets/eye.svg" alt="">
                </li>
                <li>
                    <img src="/public/assets/pencil.svg" alt="">
                </li>
                <li>
                    <img src="/public/assets/trash.svg" alt="">
                </li>
                </ul>
            </td>
        `;
        novoTexto += "</tr>";
    }
    tabelaPostsBody.innerHTML = novoTexto;
}