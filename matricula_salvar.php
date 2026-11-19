<?php
require __DIR__ . '/conexao.php';

use MongoDB\BSON\ObjectId;
use MongoDB\BSON\UTCDateTime;

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: matricula_form.php');
    exit;
}

$erro    = null;
$sucesso = false;

try {
    $estudanteId = new ObjectId($_POST['estudante_id']);
    $cursoId     = new ObjectId($_POST['curso_id']);
} catch (Exception $e) {
    $erro = 'Selecione um estudante e um curso.';
}

if (!$erro) {
    $estudante = $banco->estudantes->findOne(['_id' => $estudanteId]);
    $curso     = $banco->cursos->findOne(['_id' => $cursoId]);

    if (!$estudante || !$curso) {
        $erro = 'Estudante ou curso não encontrado.';
    }
}

if (!$erro) {
    $jaMatriculado = $banco->matriculas->countDocuments([
        'estudante_id' => $estudanteId,
        'curso_id'     => $cursoId,
    ]);

    if ($jaMatriculado > 0) {
        $erro = 'Este estudante já está matriculado neste curso.';
    }
}

if (!$erro) {
    $ocupadas = $banco->matriculas->countDocuments(['curso_id' => $cursoId]);

    if ($ocupadas >= $curso['vagas']) {
        $erro = 'Não há vagas neste curso.';
    }
}

if (!$erro) {
    $banco->matriculas->insertOne([
        'estudante_id'   => $estudanteId,
        'curso_id'       => $cursoId,
        'data_matricula' => new UTCDateTime(),
    ]);
    $sucesso = true;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $sucesso ? 'Matrícula realizada' : 'Matrícula não realizada' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4 mb-5">
    <h1>Sistema Acadêmico</h1>

    <?php if ($sucesso): ?>
        <div class="alert alert-success mt-3" role="alert">
            Matrícula realizada!
        </div>

        <div class="card">
            <div class="card-body">
                <p class="card-text mb-1"><strong>Estudante:</strong> <?= htmlspecialchars($estudante['nome']) ?></p>
                <p class="card-text mb-0"><strong>Curso:</strong> <?= htmlspecialchars($curso['nome']) ?></p>
            </div>
        </div>
    <?php else: ?>
        <div class="alert alert-danger mt-3" role="alert">
            <?= htmlspecialchars($erro) ?>
        </div>
    <?php endif; ?>

    <div class="mt-3">
        <a href="matricula_form.php" class="btn btn-primary"><?= $sucesso ? 'Nova matrícula' : 'Voltar' ?></a>
        <a href="matricula_listar.php" class="btn btn-outline-primary">Ver matrículas</a>
        <a href="index.php" class="btn btn-outline-secondary">Início</a>
    </div>
</div>
</body>
</html>