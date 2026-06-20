<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Api Ninjas Exercises | Rastros de Fibra</title>
    <link rel="stylesheet" href="../../../public/css/api.css">
</head>

<body>
    <?php require 'navbar.view.php' ?>

    <main class="api-page">
        <?php $exerciseCards = $exerciseCards ?? []; ?>
        <?php $filters = $filters ?? []; ?>

        <section class="api-hero">
            <div class="api-hero__content">
                <span class="api-kicker">API Ninjas</span>
                <h1>Biblioteca pública de exercícios para estudo e consulta rápida.</h1>
                <p>
                    Esta página consome a API de exercícios da API Ninjas e exibe nome, grupo muscular,
                    nível de dificuldade, tipo e instruções resumidas. A fonte usada pelo controller é
                    <strong><?= htmlspecialchars($apiSource ?? 'https://api.api-ninjas.com/v1/exercises') ?></strong>.
                </p>
                <div class="api-hero__stats">
                    <article>
                        <strong><?= isset($exerciseCards) ? count($exerciseCards) : 0 ?></strong>
                        <span>exercícios carregados</span>
                    </article>
                    <article>
                        <strong><?= htmlspecialchars($apiStatus ?? 'offline') ?></strong>
                        <span>status da integração</span>
                    </article>
                </div>
            </div>
            <aside class="api-hero__panel">
                <h2>Como funciona</h2>
                <p>
                    O backend consulta a API Ninjas, normaliza a resposta e entrega os dados para esta view.
                    Se a chave da API não estiver configurada, a página mostra um estado orientativo.
                </p>
                <ul>
                    <li>Endpoint `/v1/exercises`</li>
                    <li>Filtros por nome, tipo e músculo</li>
                    <li>Renderização server-side</li>
                </ul>
            </aside>
        </section>

        <section class="api-section">
            <div class="api-section__header">
                <h2>Exercícios em destaque</h2>
                <p>Use os filtros abaixo para consultar a base pública da API Ninjas. O campo de nome aceita palavras
                    parciais e separa a busca por termos.</p>
            </div>

            <form class="api-filters" method="GET" action="/api">
                <label>
                    <span>Nome ou trecho</span>
                    <input type="text" name="name" value="<?= htmlspecialchars($filters['name'] ?? '') ?>"
                        placeholder="bench press">
                </label>
                <label>
                    <span>Tipo</span>
                    <input type="text" name="type" value="<?= htmlspecialchars($filters['type'] ?? '') ?>"
                        placeholder="strength">
                </label>
                <label>
                    <span>Músculo</span>
                    <input type="text" name="muscle" value="<?= htmlspecialchars($filters['muscle'] ?? '') ?>"
                        placeholder="biceps">
                </label>
                <label>
                    <span>Dificuldade</span>
                    <select name="difficulty">
                        <option value="">Todas</option>
                        <option value="beginner" <?= ($filters['difficulty'] ?? '') === 'beginner' ? 'selected' : '' ?>>
                            beginner</option>
                        <option value="intermediate" <?= ($filters['difficulty'] ?? '') === 'intermediate' ? 'selected' : '' ?>>intermediate</option>
                        <option value="expert" <?= ($filters['difficulty'] ?? '') === 'expert' ? 'selected' : '' ?>>expert
                        </option>
                    </select>
                </label>
                <label>
                    <span>Equipamentos</span>
                    <input type="text" name="equipments" value="<?= htmlspecialchars($filters['equipments'] ?? '') ?>"
                        placeholder="dumbbells,bench">
                </label>
                <button type="submit">Buscar</button>
            </form>

            <?php if (!empty($exerciseCards)): ?>
                <div class="api-grid">
                    <?php foreach ($exerciseCards as $exercise): ?>
                        <article class="api-card">
                            <div class="api-card__badge"><?= htmlspecialchars($exercise['difficulty']) ?></div>
                            <h3><?= htmlspecialchars($exercise['name']) ?></h3>
                            <p><?= htmlspecialchars($exercise['description']) ?></p>
                            <div class="api-card__tags">
                                <span><?= htmlspecialchars($exercise['type']) ?></span>
                                <span><?= htmlspecialchars($exercise['muscle']) ?></span>
                            </div>
                            <?php if (!empty($exercise['equipments'])): ?>
                                <div class="api-card__equipment">
                                    <?php foreach ($exercise['equipments'] as $equipment): ?>
                                        <span><?= htmlspecialchars($equipment) ?></span>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                            <div class="api-card__footer">
                                <span><?= htmlspecialchars($exercise['type']) ?></span>
                                <span><?= htmlspecialchars($exercise['muscle']) ?></span>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <div class="api-empty">
                    <?php if (!($hasApiKey ?? false)): ?>
                        <h3>Configure sua chave da API Ninjas</h3>
                        <p>
                            Defina a variável de ambiente <strong>API_NINJAS_KEY</strong> ou
                            <strong>API_NINJAS_API_KEY</strong> para liberar a consulta dos exercícios.
                        </p>
                    <?php else: ?>
                        <h3>Nenhum exercício foi carregado</h3>
                        <p>
                            A API retornou uma resposta vazia para os filtros informados. Tente ajustar a
                            busca e recarregar a página.
                        </p>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </section>
    </main>

    <?php require 'footer.view.php' ?>
</body>

</html>