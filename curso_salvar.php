<?php
require __DIR__ . '/conexao.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: curso_form.php');
    exit;
}

$curso = [
    'nome'          => trim($_POST['nome']),
    'codigo'        => strtoupper(trim($_POST['codigo'])),
    'carga_horaria' => (int) $_POST['carga_horaria'],
    'descricao'     => trim($_POST['descricao']),
    'vagas'         => (int) $_POST['vagas'],
    'valor'         => (float) $_POST['valor'],
];

$resultado = $banco->cursos->insertOne($curso);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Curso cadastrado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4 mb-5">
    <h1>Sistema Acadêmico</h1>

    <div class="alert alert-success mt-3" role="alert">
        Curso cadastrado com sucesso!
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title"><?= htmlspecialchars($curso['nome']) ?></h5>
            <p class="card-text mb-1"><strong>Código:</strong> <?= htmlspecialchars($curso['codigo']) ?></p>
            <p class="card-text mb-1"><strong>Carga horária:</strong> <?= $curso['carga_horaria'] ?> h</p>
            <p class="card-text mb-1"><strong>Vagas:</strong> <?= $curso['vagas'] ?></p>
            <p class="card-text mb-1"><strong>Mensalidade:</strong> R$ <?= number_format($curso['valor'], 2, ',', '.') ?></p>
            <p class="card-text mb-0"><strong>Descrição:</strong> <?= htmlspecialchars($curso['descricao']) ?></p>
        </div>
    </div>

    <div class="mt-3">
        <a href="curso_form.php" class="btn btn-primary">Cadastrar outro</a>
        <a href="curso_listar.php" class="btn btn-outline-primary">Ver cursos</a>
        <a href="index.php" class="btn btn-outline-secondary">Início</a>
    </div>
</div>
</body>
</html>