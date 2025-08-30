<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Filmes</title>
    <link rel="stylesheet" href="<?= base_url('css/1.css') ?>">
   
</head>
<body>

<h1>Filmes </h1>
    <div class="movie-grid">
        <?php if(!empty($filmes)): ?>
            <?php foreach($filmes as $filme): ?>
                <a href="<?= base_url('filme/view/' . $filme['id']) ?>" class="movie-card">
                    <?php if(!empty($filme['capa'])): ?>
                        <img src="<?= esc($filme['capa']) ?>" alt="Pôster do filme <?= esc($filme['filme']) ?>">
                    <?php endif; ?>
                    <span class="movie-card-title"><?= esc($filme['filme']) ?></span>
                </a>
            <?php endforeach; ?>
        <?php else: ?>
            <div style="grid-column: 1 / -1; text-align: center;">
                <p>Nenhuma produção encontrada.</p>
            </div>
        <?php endif; ?>
    </div>
</div>
</body>
</html>