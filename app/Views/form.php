<?php helper('form'); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title><?= isset($filme) ? 'Editar Filme' : 'Novo Filme' ?></title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body>
<div class="container mt-5">

    <?php
    // Corrigido: sempre usar barra inicial para bater com as rotas
    $action = isset($filme) && !empty($filme['id'])
        ? base_url('/filme/atualizar/' . $filme['id'])
        : base_url('/filme/cadastrar');
    ?>

    <?= form_open($action) ?>
    <h1>Formulário</h1>
    <br>
    <div class="form-group">
        <label for="filme">Filme</label>
        <input type="text" name="filme" id="filme" class="form-control" 
               value="<?= esc($filme['filme'] ?? '') ?>" required>
    </div>

    <div class="form-group">
        <label for="nota">Nota</label>
        <input type="number" step="0.1" name="nota" id="nota" class="form-control" 
               value="<?= esc($filme['nota'] ?? '') ?>">
    </div>

    <div class="form-group">
        <label for="comentario">Comentário</label>
        <textarea name="comentario" id="comentario" class="form-control"><?= esc($filme['comentario'] ?? '') ?></textarea>
    </div>

    <div class="form-group">
        <label for="status">Status</label>
        <select name="status" id="status" class="form-control">
            <?php
            $statuses = ['assistido', 'planejado', 'em andamento', 'abandonado'];
            $currentStatus = $filme['status'] ?? '';
            foreach ($statuses as $statusOption):
                $selected = ($currentStatus === $statusOption) ? 'selected' : '';
            ?>
                <option value="<?= esc($statusOption) ?>" <?= $selected ?>><?= esc($statusOption) ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group">
        <label for="duracao">Duração (minutos)</label>
        <input type="number" name="duracao" id="duracao" class="form-control" 
               value="<?= esc($filme['duracao'] ?? '') ?>">
    </div>

    <div style="margin-top: 20px;">
        <button type="submit" class="btn btn-success"><?= isset($filme) ? 'Atualizar' : 'Salvar' ?></button>
        <br>
        <a href="<?= base_url('/filmes') ?>" class="btn btn-secondary">Voltar</a>
    </div>

    <?= form_close() ?>

</div>
</body>
</html>
