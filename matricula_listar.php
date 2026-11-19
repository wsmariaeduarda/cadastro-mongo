<?php
require __DIR__ . '/conexao.php';

$matriculas = $banco->matriculas->aggregate([
    ['$lookup' => [
        'from'         => 'estudantes',
        'localField'   => 'estudante_id',
        'foreignField' => '_id',
        'as'           => 'estudante',
    ]],
    ['$lookup' => [
        'from'         => 'cursos',
        'localField'   => 'curso_id',
        'foreignField' => '_id',
        'as'           => 'curso',
    ]],
    ['$unwind' => '$estudante'],
    ['$unwind' => '$curso'],
    ['$sort'   => ['data_matricula' => -1]],
]);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Matrículas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4 mb-5">
    <h1>Matrículas</h1>
    <a href="matricula_form.php" class="btn btn-primary mb-3">Nova matrícula</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Estudante</th>
                <th>Matrícula</th>
                <th>Curso</th>
                <th>Data</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($matriculas as $m): ?>
            <tr>
                <td><?= htmlspecialchars($m['estudante']['nome']) ?></td>
                <td><?= htmlspecialchars($m['estudante']['matricula']) ?></td>
                <td><?= htmlspecialchars($m['curso']['codigo']) ?> - <?= htmlspecialchars($m['curso']['nome']) ?></td>
                <td><?= $m['data_matricula']->toDateTime()->setTimezone(new DateTimeZone('America/Sao_Paulo'))->format('d/m/Y H:i') ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>