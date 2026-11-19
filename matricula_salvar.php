<?php
require __DIR__ . '/conexao.php';

use MongoDB\BSON\ObjectId;
use MongoDB\BSON\UTCDateTime;

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: matricula_form.php');
    exit;
}

try {
    $estudanteId = new ObjectId($_POST['estudante_id']);
    $cursoId     = new ObjectId($_POST['curso_id']);
} catch (Exception $e) {
    exit('Selecione um estudante e um curso. <a href="matricula_form.php">Voltar</a>');
}

$estudante = $banco->estudantes->findOne(['_id' => $estudanteId]);
$curso     = $banco->cursos->findOne(['_id' => $cursoId]);

if (!$estudante || !$curso) {
    exit('Estudante ou curso não encontrado. <a href="matricula_form.php">Voltar</a>');
}

$jaMatriculado = $banco->matriculas->countDocuments([
    'estudante_id' => $estudanteId,
    'curso_id'     => $cursoId,
]);

if ($jaMatriculado > 0) {
    exit('Este estudante já está matriculado neste curso. <a href="matricula_form.php">Voltar</a>');
}

$ocupadas = $banco->matriculas->countDocuments(['curso_id' => $cursoId]);

if ($ocupadas >= $curso['vagas']) {
    exit('Não há vagas neste curso. <a href="matricula_form.php">Voltar</a>');
}

$banco->matriculas->insertOne([
    'estudante_id'   => $estudanteId,
    'curso_id'       => $cursoId,
    'data_matricula' => new UTCDateTime(),
]);

echo 'Matrícula realizada!';
echo '<br><a href="matricula_form.php">Nova matrícula</a>';
echo ' | <a href="matricula_listar.php">Ver matrículas</a>';