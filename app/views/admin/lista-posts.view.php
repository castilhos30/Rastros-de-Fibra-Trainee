<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Posts</title>
    <link rel="stylesheet" href="/public/css/lista-posts.css">
    <link rel="stylesheet" href="/public/css/modal.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://googleapis.com" rel="stylesheet">
</head>

<body>
    <div class="filtro" id="filtro"></div>
    <div class="lista-posts-base">
        <div>
            <h1>Lista de Posts</h1>
        </div>
        <div class="navbar">
            <div class="searchbar">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" placeholder="Pesquisar...">
            </div>
            <button type="button" class="botao-atual" onclick="abrirModal('modalCriar')">Criar Publicação</button>
        </div>
        <div class="container-tabela">
            <table class="tabelaposts">
                <thead>
                    <tr>
                        <th>Post ID</th>
                        <th>Data</th>
                        <th>Título</th>
                        <th>Autor</th>
                        <th>Interações</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody id="tabelapostsbody">
                    <?php foreach ($posts as $post): ?>
                    <tr>
                    <td> <?= $post->id ?></td>
                    <td> <?= $post->data ?></td>
                    <td> <?= $post->titulo ?></td>
                    <td> <?= $post->criador ?></td>
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
                    <td>
                    <ul>
                        <li>
                            <button type="button" class="btn btn-visualizar" data-id="<?= $post->id ?>" onclick="abrirModal('modalVisualizar<?= $post->id ?>')">
                            <i class="fa-regular fa-eye" style="color:white;"></i>
                        </button>
                        </li>
                        <li>
                            <button type="button" class="btn btn-editar" data-id="<?= $post->id ?>" onclick="abrirModal('modalEditar<?= $post->id ?>')">
                            <i class="fa-regular fa-pen-to-square" style="color:white;"></i>
                        </button>
                        </li>
                        <li>
                            <button type="button" class="btn btn-excluir" data-id="<?= $post->id ?>" onclick="abrirModal('modalExcluir');mudarIdModalExcluir('<?= $post->id ?>')">
                            <i class="fa-regular fa-trash-can" style="color:white;"></i>
                        </button>
                        </li>
                    </ul>
                    </td>
                    </tr>
                    <?php endforeach; ?> 
                </tbody>
            </table>
        </div>
        <div class="final-botoes">
            <button class="sem-mais-paginas">
                <img src="/public/assets/white-left-arrow.svg" alt="">
                Anterior
            </button>
            <button class="botao-atual">1</button>
            <button>2</button>
            <button>
                Próximo
                <img src="/public/assets/white-right-arrow.svg" alt="">
            </button>
        </div>
    </div>

    <!--Modal Criação-->
    <form method="POST" action="/lista-posts/create">
        <div class="lista-posts-modal lista-posts-visualizar" id="modalCriar">
            <h3>Criação de Post</h3>
            <div class="lista-posts-identificacao">
                <img class="lista-posts-imagem" src="../../../public/assets/imgnormal.jpg" alt="Imagem do post">
            </div>
            <div class="lista-posts-conteudo">
                <div class="lista-posts-titulo">
                    <h5>Título:</h5>
                    <input type="text" class="input titulo" placeholder="Título" name="titulo">
                </div>
                <div class="lista-posts-descricao">
                    <h5>Descrição:</h5>
                    <input type="text" class="input descricao" placeholder="Descrição" name="descricao">
                </div>
            </div>
            <div class="lista-posts-botoes">
                <button type="submit" class="lista-posts-botao criar-post">Criar post</button>
                <button type="button" class="lista-posts-botao voltar" onclick="fecharModal('modalCriar')">Fechar</button>
            </div>
        </div>
    </form>

    <?php foreach ($posts as $post): ?>
    <!--Modal Visualização-->
    <form>
        <div class="lista-posts-modal lista-posts-visualizar" id="modalVisualizar<?= $post->id ?>">
            <h3>Informações do Post</h3>
            <div class="scroll">
                <div class="lista-posts-identificacao">
                    <img class="lista-posts-imagem" src="../../../public/assets/imgnormal.jpg" alt="Imagem do post">
                    <div class="lista-posts-informacoes">
                        <div class="lista-posts-id">
                            <h5>ID:</h5><input type="text" class="input" name="id" placeholder="<?= $post->id; ?>" readonly>
                        </div>
                        <div class="lista-posts-autor">
                            <h5>Autor:</h5><input type="text" class="input" name="autor" placeholder="<?= $post->criador; ?>" readonly>
                        </div>
                        <div class="lista-posts-data">
                            <h5>Criação:</h5><input type="text" class="input" name="data" placeholder="<?= $post->data; ?>" readonly>
                        </div>
                    </div>
                </div>
                <div class="lista-posts-conteudo">
                    <div class="lista-posts-titulo">
                        <h5>Título:</h5>
                        <input type="text" class="input titulo" placeholder="<?= $post->titulo; ?>" name="titulo">
                    </div>
                    <div class="lista-posts-descricao">
                        <h5>Descrição:</h5>
                        <input type="text" class="input descricao" placeholder="<?= $post->descricao; ?>" name="descricao">
                    </div>
                </div>
            </div>
            <div class="lista-posts-botoes">
                <button type="button" class="lista-posts-botao abrir-post">Abrir post</button>
                <button type="button" class="lista-posts-botao voltar" onclick="fecharModal('modalVisualizar<?= $post->id ?>')">Fechar</button>
            </div>
        </div>
    </form>

    <!--Modal Edição-->
    <form method="POST" action="/lista-posts/edit">
        <div class="lista-posts-modal lista-posts-visualizar" id="modalEditar<?= $post->id ?>">
            <h3>Edição de Post</h3>
            <input type="hidden" name="id" value="<?= $post->id ?>">
            <div class="lista-posts-identificacao">
                <img class="lista-posts-imagem" src="../../../public/assets/imgnormal.jpg" alt="Imagem do post">
            </div>
            <div class="lista-posts-conteudo">
                <div class="lista-posts-titulo">
                    <h5>Título:</h5>
                    <input type="text" class="input titulo" placeholder="<?= $post->titulo ?>" name="titulo">
                </div>
                <div class="lista-posts-descricao">
                    <h5>Descrição:</h5>
                    <input type="text" class="input descricao" placeholder="<?= $post->descricao ?>" name="descricao">
                </div>
            </div>
            <div class="lista-posts-botoes">
                <button type="submit" class="lista-posts-botao salvar">Salvar</button>
                <button type="button" class="lista-posts-botao voltar" onclick="fecharModal('modalEditar<?= $post->id ?>')">Voltar</button>
            </div>
        </div>
    </form>

    <!--Modal Exclusão-->
    <form method="POST" action="/lista-posts/delete">
        <div class="lista-posts-modal lista-posts-visualizar" id="modalExcluir">
            <h3>Excluir Post</h3>
            <img src="../../../public/assets/ratoeira.png" alt="Rato pegando um queijo de uma ratoeira">
            <h5>Tem certeza que deseja excluir este post?</h5>
            <div class="lista-posts-botoes">
                <button type="submit" class="lista-posts-botao excluir">Excluir</button>
                <button type="button" class="lista-posts-botao voltar" onclick="fecharModal('modalExcluir')">Cancelar</button>
            </div>
        </div>
        <input type="hidden" id="modalExcluirId" name="id" value="">
    </form>
    <?php endforeach; ?>
    <script src="/public/js/lista-posts.js"></script>
    <script>
            window.listaPostsData = <?= json_encode(array_map(static function ($post) {
            return [
                'id' => $post->id,
                'data' => $post->data,
                'titulo' => $post->titulo,
                'criador' => $post->criador,
            ];
        }, $posts), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) ?>;
    </script>
</body>

</html>