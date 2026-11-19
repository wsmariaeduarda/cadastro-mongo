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

echo 'Curso cadastrado! ID: ' . $resultado->getInsertedId();
echo '<br><a href="curso_form.php">Cadastrar outro</a>';
echo ' | <a href="curso_listar.php">Ver cursos</a>';