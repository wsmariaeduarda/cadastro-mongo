<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Estudante</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h1>Cadastro de Estudante</h1>

    <form method="post" action="estudante_salvar.php">

        <div class="mb-3">
            <label class="form-label">Nome</label>
            <input type="text" name="nome" class="form-control" required>
        </div>

        <!-- os outros campos entram aqui -->

        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</div>
</body>
</html>