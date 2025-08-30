<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Filmes</title>
    <link rel="stylesheet" href="<?= base_url('css/1.css') ?>">
</head>
<body>

<h1>Filmes</h1>

<!-- Exibir mensagens flash -->
<?php if (!empty($message)): ?>
    <div class="alert alert-success"><?= esc($message) ?></div>
<?php endif; ?>

<?php if (!empty($error)): ?>
    <div class="alert alert-danger"><?= esc($error) ?></div>
<?php endif; ?>

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

<div style="margin-bottom:20px;">
   <a href="<?= base_url('filme/form') ?>" class="btn btn-success">Nova Produção</a>
</div>

</body>
</html>
