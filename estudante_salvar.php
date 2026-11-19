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

echo '<br><a href="estudante_form.php">Cadastrar outro</a>';
echo ' | <a href="estudante_listar.php">Ver estudantes</a>';