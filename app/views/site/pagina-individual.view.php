<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina Individual</title>
    <link rel="stylesheet" href="../../../public/css/pagina-individual.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="cardpostindividual">
        <div class="cimapostindividual">
            <div class="botaoeautorindividual">
                <div class="botaosetaindividual">
                    <i class="fa-solid fa-arrow-left"></i>
                </div>

                <div class="autorpostindividual">
                    <img class="imagemautorpostindividual" src="
                    <?= $usuario->foto ? $usuario->foto : "/public/assets/icon-user.png" ?>
                    ">
                    <h1 class="nomeautorpostindividual">
                        <?= $post->criador ?>
                    </h1>
                </div>
            </div>
            <div class="datapostindividual">
                <i class="fa-regular fa-calendar"></i>
                <?php
                $data = new DateTime($post->data);
                $dataFormatada = $data->format('d/m/Y');
                ?>
                <h3 class="data-texto"> <?= $dataFormatada ?> </h3>
            </div>

        </div>



        <div class="baixopostindividual">
            <h1 class="titulopostindividual">
                <?= $post->titulo ?>
            </h1>
            <div class="divpraimagem">
                <img class="imagempostidividual" src="
                <?= $post->foto ? $post->foto : "" ?>
                ">
            </div>

            <p class="descricaopostindividual">
                <?= $post->descricao ?>
            </p>

            <div class="likedislike">
                <form method="POST" action="pagina-individual/on-like">
                    <i class="fa-regular fa-thumbs-up" onclick=""></i>
                </form>
                <h3> <?= $interacao ? $interacao->likes : 0 ?> </h3>
                <i class="fa-regular fa-thumbs-down"></i>
                <h3>
                    <?= $interacao ? $interacao->dislikes : 0 ?>
                </h3>
                <div class="linkcompartilhar">
                    <i class="fa-solid fa-share" id="botaocopiar"></i>
                    <span id="avisoCopiado" style="display:none;">Link copiado!</span>
                </div>

            </div>

            <div class="comentariospostindividual">
                <h1 class="titulocomentario">
                    Comentários
                </h1>

                <form class="escrevercomentario" method="POST" action="pagina-individual/novo-comentario">
                    <input type="text" name="texto" class="inputcomentario"
                        placeholder="Escreva um comentário..."></input>
                    <button class="botaoenviar">
                        <h3 class="enviarcomentario"> Enviar </h3>
                    </button>

                    <input type="hidden" name="id_post" value="<?= $post->id ?>">
                </form>

                <div class="comentariosindividuais">
                    <?php foreach ($comentario_arr as $comentario): ?>
                        <div class="caixadecomentario">
                            <div class="comentariocompleto">
                                <div class="userinfo">
                                    <img class="userfoto" src="/public/assets/icon-user.png">
                                    <?php $usuario_com = array_filter($usuarios, function ($u) use ($comentario) {
                                        return $u->id === $comentario->id_criador;
                                    });
                                    $usuario_com = reset($usuario_com);
                                    ?>
                                    <h3 class="nomeusuariocomentario">
                                        <?= $usuario_com ? $usuario_com->nome : 'NOME_USUARIO_NAO_ENCONTRADO' ?>
                                    </h3>
                                </div>
                                <p class="textocomentario">
                                    <?= $comentario->texto ?>
                                </p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>