<?php
require __DIR__ . '/conexao.php';

$estudantes = $banco->estudantes->find([], ['sort' => ['nome' => 1]]);
$cursos     = $banco->cursos->find([], ['sort' => ['nome' => 1]]);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Matrícula</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4 mb-5">
    <h1>Matricular estudante em curso</h1>

    <form method="post" action="matricula_salvar.php">

        <div class="mb-3">
            <label class="form-label">Estudante</label>
            <select name="estudante_id" class="form-select" required>
                <option value="">Selecione</option>
                <?php foreach ($estudantes as $e): ?>
                    <option value="<?= $e['_id'] ?>">
                        <?= htmlspecialchars($e['nome']) ?> (<?= htmlspecialchars($e['matricula']) ?>)
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Curso</label>
            <select name="curso_id" class="form-select" required>
                <option value="">Selecione</option>
                <?php foreach ($cursos as $c): ?>
                    <option value="<?= $c['_id'] ?>">
                        <?= htmlspecialchars($c['codigo']) ?> - <?= htmlspecialchars($c['nome']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Matricular</button>
        <a href="matricula_listar.php" class="btn btn-secondary">Ver matrículas</a>
    </form>
</div>
</body>
</html>