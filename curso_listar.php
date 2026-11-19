<?php
require __DIR__ . '/conexao.php';

$cursos = $banco->cursos->find([], ['sort' => ['nome' => 1]]);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cursos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4 mb-5">
    <h1>Cursos</h1>
    <a href="curso_form.php" class="btn btn-primary mb-3">Novo curso</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Código</th>
                <th>Nome</th>
                <th>Carga horária</th>
                <th>Vagas</th>
                <th>Mensalidade</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($cursos as $c): ?>
            <tr>
                <td><?= htmlspecialchars($c['codigo']) ?></td>
                <td><?= htmlspecialchars($c['nome']) ?></td>
                <td><?= $c['carga_horaria'] ?> h</td>
                <td><?= $c['vagas'] ?></td>
                <td>R$ <?= number_format($c['valor'], 2, ',', '.') ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>