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
                <span class="api-kicker">Biblioteca de Exercícios</span>
                <h1>Encontre exercícios para complementar seus treinos.</h1>
                <p>
                    Explore uma coleção de exercícios organizados por grupo muscular,
                    dificuldade e modalidade. Utilize os filtros para encontrar opções
                    adequadas ao seu objetivo e conhecer novas variações para seus treinos.
                </p>

                <div class="api-hero__stats">
                    <article>
                        <strong>
                            <?= isset($exerciseCards) ? count($exerciseCards) : 0 ?>
                        </strong>
                        <span>exercícios encontrados</span>
                    </article>
                    <article>
                        <strong>
                            <?= htmlspecialchars($apiStatus ?? 'indisponível') ?>
                        </strong>
                        <span>biblioteca</span>
                    </article>
                </div>
            </div>

            <aside class="api-hero__panel">
                <h2>Pesquise com facilidade</h2>
                <p>
                    Filtre os exercícios por nome, grupo muscular, tipo ou nível de
                    dificuldade para encontrar rapidamente o que procura.
                </p>
            </aside>
        </section>
        <section class="api-section">
            <div class="api-section__header">
                <h2>Catálogo de Exercícios</h2>
                <p>Use os filtros abaixo para encontrar exercícios específicos.</p>
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
                        <option value="expert" <?= ($filters['difficulty'] ?? '') === 'expert' ? 'selected' : '' ?>>
                            expert
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
                        <h3>Biblioteca temporariamente indisponível</h3>
                        <p>
                            Não foi possível carregar os exercícios neste momento.
                            Tente novamente mais tarde.
                        </p>
                    <?php else: ?>
                        <h3>Nenhum exercício encontrado</h3>
                        <p>
                            Não encontramos exercícios com os filtros informados.
                            Tente utilizar termos diferentes ou remover alguns filtros.
                        </p>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </section>
    </main>

    <?php require 'footer.view.php' ?>
</body>

</html>