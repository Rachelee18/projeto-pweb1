<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Livro</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>

<body>
    <h1>Cadastrar Livro</h1>

    <form action="#" method="POST">
        @csrf
        <label>Título:</label>
        <input type="text" name="titulo" required><br>

        <label>Autor:</label>
        <input type="text" name="autor" required><br>

        <label>ISBN:</label>
        <input type="text" name="isbn" required><br>

        <label>Ano:</label>
        <input type="number" name="ano" required><br>

        <label>Editora:</label>
        <input type="text" name="editora" required><br>

        <label>Quantidade:</label>
        <input type="number" name="quantidade" required><br>

        <button type="submit">Salvar</button>
    </form>

    <a href="{{ route('livros.index') }}">Voltar ao Catálogo</a>
</body>

</html>
