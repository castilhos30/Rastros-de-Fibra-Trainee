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
    <?php require("sidebar.view.php"); ?>
    <div class="container">
        <div class="titulolistauser"> Lista de Usuários </div>
        <div class="segundadiv">
            <div class="barradepesquisa">
                <i class="fa-solid fa-magnifying-glass"></i>
                <form class="searchbar" method="GET" action="/lista-de-usuarios">
                    <input type="text" name="pesquisa" class="pesquisarusuario" placeholder="Pesquisar..."></input>
                </form>
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
                    <?php foreach ($usuarios as $usuario): ?>
                        <tr>
                            <td><?= $usuario->id ?></td>
                            <td><?= $usuario->nome ?></td>
                            <td><?= $usuario->email ?></td>
                            <td>
                                <div class="iconestabela">
                                    <button type="button" class="btn-acao btn-visualizar"
                                        onclick="abrirModal('modalvisualizar-<?= $usuario->id ?>')">
                                        <i class="fa-regular fa-eye"></i>
                                    </button>

                                    <button type="button" class="btn-acao btn-editar"
                                        onclick="<?= $ehAdmin || $usuario->id == $idUsuarioLogado ? "abrirModal('modaleditar-$usuario->id')" : '' ?>">
                                        <i class=" fa-regular fa-pen-to-square"></i>
                                    </button>

                                    <button type="button" class="btn-acao btn-excluir"
                                        onclick="<?= $ehAdmin || $usuario->id == $idUsuarioLogado ? "abrirModal('modalexcluir-$usuario->id')" : '' ?>">
                                        <i class="fa-regular fa-trash-can"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
        <?php require("pagination.view.php"); ?>
    </div>


    <div class="filtro" id="filtro"></div>


    <!-- Modal Criar -->
    <div class="modal-criar-editar">
        <div class="painel" id="modalcriar">
            <h1>Criação de Usuário</h1>
            <form method="POST" action="/lista-de-usuarios/criar" enctype="multipart/form-data">
                <div class="container-foto-upload">
                    <label for="foto-criacao" class="label-foto">
                        <img src="/public/assets/icon-user.png" class="foto-perfil preview-usuario" alt="Foto">
                    </label>
                    <input type="file" name="foto" id="foto-criacao" accept="image/*" class="input-foto-oculto">
                </div>
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
                    <button type="button" onclick="fecharModal('modalcriar')">Fechar</button>
                </div>
            </form>
        </div>
    </div>


    <?php foreach ($usuarios as $usuario): ?>

        <!-- Modal Editar -->
        <div class="modal-criar-editar">
            <div class="painel" id="modaleditar-<?= $usuario->id ?>">
                <h1>Edição de Usuário</h1>
                <form method="POST" action="/lista-de-usuarios/editar" enctype="multipart/form-data">
                    <div class="container-foto-upload">
                        <label for="foto-edicao-<?= $usuario->id ?>" class="label-foto">
                            <img src="/<?= $usuario->foto ?>" class="foto-perfil preview-usuario" alt="Foto">
                        </label>
                        <input type="file" name="foto" id="foto-edicao-<?= $usuario->id ?>" accept="image/*"
                            class="input-foto-oculto">
                    </div>
                    <div class="formcampos">
                        <label for="nome">Nome:</label>
                        <input type="text" name="nome" id="nome" value="<?= $usuario->nome ?>">
                        <label for="email">Email:</label>
                        <input type="email" name="email" id="email" value="<?= $usuario->email ?>">
                        <label for="senha">Senha:</label>
                        <input type="password" name="senha" id="senha" value="<?= $usuario->senha ?>">
                    </div>
                    <div class="formbotoes">
                        <input type="hidden" name="id" value="<?= $usuario->id ?>">
                        <input type="submit" value="Editar">
                        <button type="button" onclick="fecharModal('modaleditar-<?= $usuario->id ?>')">Fechar</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Modal Visualizar -->
        <div class="painelcontainer" id="modalvisualizar-<?= $usuario->id ?>">
            <h1>Informações do Usuário</h1>
            <form>
                <div class="visualizarusuario">
                    <div class="container-foto-visualizar">
                        <img src="<?= $usuario->foto ?>" class="foto-perfil-leitura" alt="Foto do Usuário">
                    </div>
                    <div class="campovisualizar">
                        <label for="usuario-id">ID:</label>
                        <input type="text" id="usuario-id" value="<?= $usuario->id ?>" readonly>
                    </div>
                    <div class="campovisualizar">
                        <label for="usuario-nome">Nome:</label>
                        <input type="text" id="usuario-nome" value="<?= $usuario->nome ?>" readonly>
                    </div>

                    <div class="campovisualizar">
                        <label for="usuario-email">Email:</label>
                        <input type="email" id="usuario-email" value="<?= $usuario->email ?>" readonly>
                    </div>

                    <div class="campovisualizar">
                        <label for="usuario-senha">Senha:</label>
                        <input type="password" id="usuario-senha" value="<?= $usuario->senha ?>" readonly>
                    </div>
                </div>
                <div class="botaofecharvisualizar">
                    <button type="button" class="fecharmodalvisualizar"
                        onclick="fecharModal('modalvisualizar-<?= $usuario->id ?>')">Fechar</button>
                </div>
            </form>
        </div>

        <!-- Modal Excluir -->
        <div class="caixadedeletar" id="modalexcluir-<?= $usuario->id ?>">
            <h1>Excluir Usuário</h1>
            <img src="../../../public/assets/logo-excluir.png" alt="Logo">
            <h3>Tem certeza que deseja excluir este usuário?</h3>
            <div class="botoesmodaldelet">
                <form method="POST" action="/lista-de-usuarios/deletar">
                    <input type="hidden" name="id" value="<?= $usuario->id ?>">
                    <button type="submit" class="botaoexcluir">Excluir</button>
                </form>
                <button class="botaocancelar" onclick="fecharModal('modalexcluir-<?= $usuario->id ?>')">Cancelar</button>
            </div>
        </div>
    <?php endforeach ?>


    <script src="../../../public/js/lista-usuarios.js"></script>
</body>

</html>