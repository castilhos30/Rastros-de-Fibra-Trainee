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
    <?php require 'sidebar.view.php' ?>
    <div class="lista-posts-base">
        <div>
            <h1 class="titulolistauser">Lista de Posts</h1>
        </div>
        <div class="navbar">
            <form class="searchbar" method="GET" action="/lista-de-posts">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" name="pesquisa" placeholder="Pesquisar..."
                    value="<?= htmlspecialchars($pesquisa ?? '', ENT_QUOTES, 'UTF-8') ?>">
            </form>
            <button type="button" class="botao-criar botao-atual" onclick="abrirModal('modalCriar')">Criar
                Publicação</button>
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
                    <?php foreach ($posts as $post):
                        $criadorPost = array_filter($usuarios, static function ($u) use ($post) {
                            return $u->id == $post->id_usuario;
                        });
                        $criadorPost = reset($criadorPost);

                        $ehEditavel = $ehAdmin || $post->id_usuario == $idUsuarioLogado;
                        $likes_c = 0;
                        $dislikes_c = 0;
                        $comentarios_c = 0;
                        $interacoes_post = array_filter($interacoes, static function ($interacao) use ($post) {
                            return $interacao->id_post == $post->id;
                        });
                        foreach ($interacoes_post as $interacao) {
                            $likes_c += $interacao->likes;
                            $dislikes_c += $interacao->dislikes;
                        }
                        $comentarios_post = array_filter($comentarios, static function ($comentario) use ($post) {
                            return $comentario->id_post == $post->id;
                        });
                        foreach ($comentarios_post as $comentario) {
                            $comentarios_c += 1;
                        }
                        ?>
                        <tr>
                            <td> <?= $post->id ?></td>
                            <td> <?= $post->data ?></td>
                            <td> <?= $post->titulo ?></td>
                            <td> <?= $criadorPost->nome ?? 'Usuário não encontrado' ?></td>
                            <td>
                                <ul>
                                    <li>
                                        <i class="fa-regular fa-thumbs-up"></i>
                                        <?= $likes_c ?>
                                    </li>
                                    <li>
                                        <i class="fa-regular fa-thumbs-down"></i>
                                        <?= $dislikes_c ?>
                                    </li>
                                    <li>
                                        <i class="fa-regular fa-comment"></i>
                                        <?= $comentarios_c ?>
                                    </li>
                                </ul>
                            </td>
                            <td>
                                <ul>
                                    <li>
                                        <button type="button" class="btn btn-visualizar" data-id="<?= $post->id ?>"
                                            onclick="abrirModal('modalVisualizar<?= $post->id ?>')">
                                            <i class="fa-regular fa-eye" style="color:white;"></i>
                                        </button>
                                    </li>
                                    <li>
                                        <button type="button" class="btn btn-editar" data-id="<?= $post->id ?>"
                                            onclick="abrirModal('<?= $ehEditavel ? 'modalEditar' : '' ?><?= $post->id ?>')">
                                            <i class="fa-regular fa-pen-to-square"
                                                style="<?= $ehEditavel ? 'color:white' : 'color:black;' ?>"></i>
                                        </button>
                                    </li>
                                    <li>
                                        <button type="button" class="btn btn-excluir" data-id="<?= $post->id ?>"
                                            onclick="abrirModal('<?= $ehEditavel ? 'modalExcluir' : '' ?>');mudarIdModalExcluir('<?= $post->id ?>')">
                                            <i class="fa-regular fa-trash-can"
                                                style="<?= $ehEditavel ? 'color:white' : 'color:black;' ?>"></i>
                                        </button>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- Paginação -->
        <?php require 'pagination.view.php' ?>

    </div>
    <script>console.log("Sessão PHP:", <?php echo json_encode($_SESSION); ?>);</script>
    <!--Modal Criação-->
    <form method="POST" action="/lista-de-posts/create" enctype="multipart/form-data">
        <div class="lista-posts-modal lista-posts-visualizar" id="modalCriar">
            <h3>Criação de Post</h3>
            <div class="scroll">
                <div class="lista-posts-identificacao">
                    <input type="file" name="imagem" accept="image/*" class="input imagem" id="imagem" required>
                    <label for="imagem" class="lista-posts-label"> <img class='lista-posts-imagem'
                            data-src-original="public\assets\imgnormal.jpg" src="public\assets\imgnormal.jpg"
                            alt="Imagem do post" />
                    </label>
                </div>
                <div class="lista-posts-conteudo">
                    <div class="lista-posts-titulo">
                        <h5>Título:</h5>
                        <input type="text" class="input titulo" placeholder="Título" name="titulo">
                    </div>
                    <div class="lista-posts-descricao">
                        <h5>Descrição:</h5>
                        <textarea class="input descricao" placeholder="Descrição" name="descricao"></textarea>
                    </div>
                </div>
            </div>
            <div class="lista-posts-botoes">
                <button type="button" class="lista-posts-botao voltar"
                    onclick="fecharModal('modalCriar')">Fechar</button>
                <button type="submit" class="lista-posts-botao criar-post">Criar post</button>
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
                        <img class="lista-posts-imagem imagemVisualizar" src="<?= $post->foto ?>" alt="Imagem do post">
                        <div class="lista-posts-informacoes">
                            <div class="lista-posts-id">
                                <h5>ID:</h5><input type="text" class="input" name="id" value="<?= $post->id; ?>" readonly>
                            </div>
                            <div class="lista-posts-autor">
                                <h5>Autor:</h5><input type="text" class="input" name="autor"
                                    placeholder="<?= $post->criador; ?>" value="<?= $post->criador; ?>" readonly>
                            </div>
                            <div class="lista-posts-data">
                                <h5>Criação:</h5><input type="text" class="input" name="data"
                                    placeholder="<?= $post->data; ?>" value="<?= $post->data; ?>" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="lista-posts-conteudo">
                        <div class="lista-posts-titulo">
                            <h5>Título:</h5>
                            <input type="text" class="input titulo" value="<?= $post->titulo; ?>" name="titulo" readonly>
                        </div>
                        <div class="lista-posts-descricao">
                            <h5>Descrição:</h5>
                            <textarea class="input descricao" placeholder="<?= $post->descricao; ?>" name="descricao"
                                readonly><?= $post->descricao ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="lista-posts-botoes">
                    <button type="button" class="lista-posts-botao voltar"
                        onclick="fecharModal('modalVisualizar<?= $post->id ?>')">Fechar</button>
                    <a href="/pagina-individual?post=<?= $post->id ?>" class="lista-posts-botao abrir-post"
                        target="_blank">Abrir post</a>
                </div>
            </div>
        </form>

        <!--Modal Edição-->
        <form method="POST" action="/lista-de-posts/edit" enctype="multipart/form-data">
            <div class="lista-posts-modal lista-posts-visualizar" id="modalEditar<?= $post->id ?>">
                <h3>Edição de Post</h3>
                <div class="scroll">
                    <input type="hidden" name="id" value="<?= $post->id ?>">
                    <div class="lista-posts-identificacao">
                        <input type="file" name="imagem" id="imagem<?= $post->id ?>" accept="image/*" class="input imagem">
                        <label for="imagem<?= $post->id ?>" class="lista-posts-label"> <img class="lista-posts-imagem"
                                data-src-original="<?= $post->foto ?>" src="<?= $post->foto ?>" alt="Imagem do post">
                        </label>
                    </div>
                    <div class="lista-posts-conteudo">
                        <div class="lista-posts-titulo">
                            <h5>Título:</h5>
                            <input type="text" class="input titulo" placeholder="<?= $post->titulo ?>" name="titulo"
                                value="<?= $post->titulo ?>" required>
                        </div>
                        <div class="lista-posts-descricao">
                            <h5>Descrição:</h5>
                            <textarea class="input descricao" placeholder="<?= $post->descricao ?>" name="descricao"
                                required><?= $post->descricao ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="lista-posts-botoes">
                    <button type="button" class="lista-posts-botao voltar"
                        onclick="fecharModal('modalEditar<?= $post->id ?>')">Voltar</button>
                    <button type="submit" class="lista-posts-botao salvar">Salvar</button>
                </div>
            </div>
        </form>

        <!--Modal Exclusão-->
        <form method="POST" action="/lista-de-posts/delete">
            <div class="lista-posts-modal lista-posts-visualizar" id="modalExcluir">
                <h3>Excluir Post</h3>
                <img src="../../../public/assets/ratoeira.png" alt="Rato pegando um queijo de uma ratoeira">
                <h5>Tem certeza que deseja excluir este post?</h5>
                <div class="lista-posts-botoes">
                    <button type="button" class="lista-posts-botao cancelar"
                        onclick="fecharModal('modalExcluir')">Cancelar</button>
                    <button type="submit" class="lista-posts-botao excluir">Excluir</button>
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