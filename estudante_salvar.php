<?php
require __DIR__ . '/conexao.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: estudante_form.php');
    exit;
}

$estudante = [
    'nome'            => trim($_POST['nome']),
    'email'           => trim($_POST['email']),
    'cpf'             => trim($_POST['cpf']),
    'data_nascimento' => $_POST['data_nascimento'],
    'telefone'        => trim($_POST['telefone']),
    'sexo'            => $_POST['sexo'],
    'matricula'       => trim($_POST['matricula']),
    'endereco'        => [
        'rua'         => trim($_POST['endereco']['rua']),
        'numero'      => trim($_POST['endereco']['numero']),
        'complemento' => trim($_POST['endereco']['complemento']),
        'bairro'      => trim($_POST['endereco']['bairro']),
        'cidade'      => trim($_POST['endereco']['cidade']),
        'estado'      => strtoupper(trim($_POST['endereco']['estado'])),
        'cep'         => trim($_POST['endereco']['cep']),
    ],
];

$resultado = $banco->estudantes->insertOne($estudante);
$e = $estudante['endereco'];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Estudante cadastrado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4 mb-5">
    <h1>Sistema Acadêmico</h1>

    <div class="alert alert-success mt-3" role="alert">
        Estudante cadastrado com sucesso!
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title"><?= htmlspecialchars($estudante['nome']) ?></h5>
            <p class="card-text mb-1"><strong>Matrícula:</strong> <?= htmlspecialchars($estudante['matricula']) ?></p>
            <p class="card-text mb-1"><strong>E-mail:</strong> <?= htmlspecialchars($estudante['email']) ?></p>
            <p class="card-text mb-0">
                <strong>Endereço:</strong>
                <?= htmlspecialchars($e['rua']) ?>, <?= htmlspecialchars($e['numero']) ?>
                <?= $e['complemento'] !== '' ? ' - ' . htmlspecialchars($e['complemento']) : '' ?>,
                <?= htmlspecialchars($e['bairro']) ?>,
                <?= htmlspecialchars($e['cidade']) ?>/<?= htmlspecialchars($e['estado']) ?>
                - CEP <?= htmlspecialchars($e['cep']) ?>
            </p>
        </div>
    </div>

    <div class="mt-3">
        <a href="estudante_form.php" class="btn btn-primary">Cadastrar outro</a>
        <a href="estudante_listar.php" class="btn btn-outline-primary">Ver estudantes</a>
        <a href="index.php" class="btn btn-outline-secondary">Início</a>
    </div>
</div>
</body>
</html>