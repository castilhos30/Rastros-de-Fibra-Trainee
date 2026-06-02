<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios</title>
    <link rel="stylesheet" href="/public/css/lista-usuarios.css">
    <link rel="stylesheet" href="/public/css/modal-criar-editar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="titulolistauser"> Lista de Usuários </div>
    <div class="segundadiv">
        <div class="barradepesquisa">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input type="text" class="pesquisarusuario" placeholder="Pesquisar..."></input>
        </div>
        <button class="botaocriaruser" onclick="abrirModal('modalcriar')">
            <i class="fa-solid fa-plus icone-mais"></i>
            <h3 class="criarusuario"> Criar Usuário </h3>
        </button>
    </div>
    <div class="containertebela">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Ações</th>

                </tr>
            </thead>
            <tbody id="tabelaBody">
                <?php foreach($usuarios as $usuario): ?>
                    <tr>
                        <td><?= $usuario->id ?></td>
                        <td><?= $usuario->nome ?></td>
                        <td><?= $usuario->email ?></td>
                        <td>
                            <div class="iconestabela">
                                <button type="button" class="btn-acao btn-visualizar" onclick="abrirModal('modalvisualizar')">
                                    <i class="fa-regular fa-eye"></i>
                                </button>
                                
                                <button type="button" class="btn-acao btn-editar" onclick="abrirModal('modaleditar')">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </button>
                                
                                <button type="button" class="btn-acao btn-excluir" onclick="abrirModal('modalexcluir')">
                                    <i class="fa-regular fa-trash-can"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                <?php endforeach?>
            </tbody>
        </table>
    </div>
    <div class="paginacao">
        <button class="botaoanterior">
            <i class="fa-solid fa-chevron-left"></i> Anterior
        </button>
        <div class="numeracaodaspag">
            <button class="numeropagina ativo">1</button>
            <button class="numeropagina">2</button>
            <button class="numeropagina">3</button>
        </div>
        <button class="botaoproximo">
            Próximo <i class="fa-solid fa-chevron-right"></i>
        </button>
    </div>


    <div class="filtro" id="filtro"></div>


    <!-- Modal Criar -->
    <div class="modal-criar-editar">
        <div class="painel" id="modalcriar">
            <h1>Criação de Usuário</h1>
            <form method="POST" action="/lista-de-usuarios/criar">
                <div class="formcampos">
                    <label for="nome">Nome:</label>
                    <input type="text" name="nome" id="nome">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email">
                    <label for="senha">Senha:</label>
                    <input type="password" name="senha" id="senha">
                </div>
                <div class="formbotoes">
                    <input type="submit" value="Criar">
                    <button onclick="fecharModal('modalcriar')">Fechar</button>
                </div>
            </form>
        </div>
    </div>


    <?php foreach($usuarios as $usuario): ?>

        <!-- Modal Editar -->
        <div class="modal-criar-editar">
            <div class="painel" id="modaleditar">
                <h1>Edição de Usuário</h1>
                <form>
                    <div class="formcampos">
                        <label for="nome">Nome:</label>
                        <input type="text" name="name" id="name">
                        <label for="email">Email:</label>
                        <input type="email" name="email" id="email">
                        <label for="senha">Senha:</label>
                        <input type="password" name="senha" id="senha">
                    </div>
                    <div class="formbotoes">
                        <input type="submit" value="Editar">
                        <button onclick="fecharModal('modaleditar')">Fechar</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Modal Visualizar -->
        <div class="painelcontainer" id="modalvisualizar">
            <h1>Informações do Usuário</h1>
            <form>
                <div class="visualizarusuario">
                    <div class="campovisualizar">
                        <label for="usuario-id">ID:</label>
                        <input type="text" id="usuario-id" value="" readonly>
                    </div>
                    <div class="campovisualizar">
                        <label for="usuario-nome">Nome:</label>
                        <input type="text" id="usuario-nome" value='' readonly>
                    </div>

                    <div class="campovisualizar">
                        <label for="usuario-email">Email:</label>
                        <input type="email" id="usuario-email" value="" readonly>
                    </div>

                    <div class="campovisualizar">
                        <label for="usuario-senha">Senha:</label>
                        <input type="password" id="usuario-senha" value="" readonly>
                    </div>
                </div>
                <div class="botaofecharvisualizar">
                    <button class="fecharmodalvisualizar" onclick="fecharModal('modalvisualizar')">Fechar</button>
                </div>
            </form>
        </div>

        <!-- Modal Excluir -->
        <div class="caixadedeletar" id="modalexcluir">
            <h1>Excluir Usuário</h1>
            <img src="../../../public/assets/logo-excluir.png" alt="Logo">
            <h3>Tem certeza que deseja excluir este usuário?</h3>
            <div class="botoesmodaldelet">
                <button class="botaoexcluir">Excluir</button>
                <button class="botaocancelar" onclick="fecharModal('modalexcluir')">Cancelar</button>
            </div>
        </div>
        <?php endforeach?>


    <script src="../../../public/js/lista-usuarios.js"></script>
</body>

</html>