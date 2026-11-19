# Sistema Acadêmico (PHP + MongoDB)

Cadastro de estudantes (com endereço), cursos e matrículas.

## Modelagem

- `estudantes`: dados do estudante com o **endereço embutido** (relação 1 para 1)
- `cursos`: dados do curso
- `matriculas`: guarda `estudante_id`, `curso_id` e `data_matricula` (**referências**, relação N para N)

## Requisitos

- PHP 8.2 com as extensões `mongodb` e `zip`
- Composer
- Conta no MongoDB Atlas (ou MongoDB local)

## Como rodar

1. Clone o repositório dentro da pasta `htdocs` do XAMPP
2. `composer install`
3. Copie `config.exemplo.php` para `config.php` e preencha a `uri` (usuário e senha do banco) e o nome do banco
4. Inicie o Apache e abra `http://localhost/cadastro-mongo/`

## Autores

- Maria Eduarda  RA:60007031
- Pedro Augusto  RA:60010321