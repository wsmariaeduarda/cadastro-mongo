<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema Acadêmico</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4 mb-5">
    <h1>Sistema Acadêmico</h1>
    <p class="text-muted">PHP + MongoDB</p>

    <div class="row g-3 mt-2">
        <div class="col-md-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Estudantes</h5>
                    <a href="estudante_listar.php" class="btn btn-outline-primary btn-sm">Listar</a>
                    <a href="estudante_form.php" class="btn btn-primary btn-sm">Novo</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Cursos</h5>
                    <a href="curso_listar.php" class="btn btn-outline-primary btn-sm">Listar</a>
                    <a href="curso_form.php" class="btn btn-primary btn-sm">Novo</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Matrículas</h5>
                    <a href="matricula_listar.php" class="btn btn-outline-primary btn-sm">Listar</a>
                    <a href="matricula_form.php" class="btn btn-primary btn-sm">Nova</a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>