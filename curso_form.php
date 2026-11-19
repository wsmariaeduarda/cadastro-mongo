<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro de Curso</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4 mb-5">
    <h1>Cadastro de Curso</h1>

    <form method="post" action="curso_salvar.php">

        <div class="mb-3">
            <label class="form-label">Nome</label>
            <input type="text" name="nome" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Código</label>
            <input type="text" name="codigo" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Carga horária (horas)</label>
            <input type="number" name="carga_horaria" class="form-control" min="1" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Descrição</label>
            <textarea name="descricao" class="form-control" rows="3" required></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Vagas</label>
            <input type="number" name="vagas" class="form-control" min="1" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Valor da mensalidade (R$)</label>
            <input type="number" name="valor" class="form-control" step="0.01" min="0" required>
        </div>


        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="curso_listar.php" class="btn btn-secondary">Ver cursos</a>
        </div>

    </form>
</div>
</body>
</html>