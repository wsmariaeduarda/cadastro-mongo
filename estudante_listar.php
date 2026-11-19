<?php
require __DIR__ . '/conexao.php';

$estudantes = $banco->estudantes->find([], ['sort' => ['nome' => 1]]);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Estudantes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4 mb-5">
    <h1>Estudantes</h1>
    <a href="estudante_form.php" class="btn btn-primary mb-3">Novo estudante</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Matrícula</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Cidade/UF</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($estudantes as $e): ?>
            <tr>
                <td><?= htmlspecialchars($e['matricula']) ?></td>
                <td><?= htmlspecialchars($e['nome']) ?></td>
                <td><?= htmlspecialchars($e['email']) ?></td>
                <td><?= htmlspecialchars($e['endereco']['cidade']) ?>/<?= htmlspecialchars($e['endereco']['estado']) ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>