<!DOCTYPE html>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro de Estudante</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4 mb-5">
    <h1>Cadastro de Estudante</h1>

    <form method="post" action="estudante_salvar.php">

        <div class="mb-3">
            <label class="form-label">Nome</label>
            <input type="text" name="nome" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">E-mail</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">CPF</label>
            <input type="text" name="cpf" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Data de nascimento</label>
            <input type="date" name="data_nascimento" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Telefone</label>
            <input type="text" name="telefone" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Sexo</label>
            <select name="sexo" class="form-select" required>
                <option value="">Selecione</option>
                <option value="F">Feminino</option>
                <option value="M">Masculino</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Matrícula</label>
            <input type="text" name="matricula" class="form-control" required>
        </div>

        <h4 class="mt-4">Endereço</h4>

        <div class="mb-3">
            <label class="form-label">Rua</label>
            <input type="text" name="endereco[rua]" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Número</label>
            <input type="text" name="endereco[numero]" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Complemento</label>
            <input type="text" name="endereco[complemento]" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Bairro</label>
            <input type="text" name="endereco[bairro]" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Cidade</label>
            <input type="text" name="endereco[cidade]" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Estado</label>
            <input type="text" name="endereco[estado]" class="form-control" maxlength="2" required>
        </div>

        <div class="mb-3">
            <label class="form-label">CEP</label>
            <input type="text" name="endereco[cep]" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</div>
</body>
</html>