<?php if ($totalPaginas > 1): ?>
    <link rel="stylesheet" href="/public/css/paginacao.css">
    <div class="pagination-container">
        <ul class="paginacao">
            <li>
                <a href="?pesquisa=<?= $pesquisa ?>&page=<?= max(1, $currentPage - 1) ?>"
                    class="<?= $currentPage <= 1 ? 'disabled' : '' ?> botaoanterior">
                    < Anterior</a>
            </li>
            <li>
                <a href="?pesquisa=<?= $pesquisa ?>&page=1"
                    class="<?= $currentPage == 1 ? 'active' : '' ?> numeropagina">1</a>
            </li>
            <?php
            $start = max(2, $currentPage - 1);
            $end = min($totalPaginas - 1, $currentPage + 1);
            ?>

            <?php if ($start > 2): ?>
                <li><span class="dots">...</span></li>
            <?php endif; ?>

            <?php for ($i = $start; $i <= $end; $i++): ?>
                <li>
                    <a href="?pesquisa=<?= $pesquisa ?>&page=<?= $i ?>"
                        class="<?= $currentPage == $i ? 'active' : '' ?> numeropagina"><?= $i ?></a>
                </li>
            <?php endfor; ?>

            <?php if ($end < $totalPaginas - 1): ?>
                <li><span class="dots">...</span></li>
            <?php endif; ?>

            <li>
                <a href="?pesquisa=<?= $pesquisa ?>&page=<?= $totalPaginas ?>"
                    class="<?= $currentPage == $totalPaginas ? 'active' : '' ?> numeropagina"><?= $totalPaginas ?></a>
            </li>

            <li>
                <a href="?pesquisa=<?= $pesquisa ?>&page=<?= min($totalPaginas, $currentPage + 1) ?>"
                    class="<?= $currentPage >= $totalPaginas ? 'disabled' : '' ?> botaoproximo">Próximo ></a>
            </li>

        </ul>
    </div>
<?php endif; ?>