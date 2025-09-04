<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Livro</title>
    <link rel="stylesheet" href="{{ asset('css/cadastrar-livro.css') }}">
</head>

<body>
    <div class="navbar">
        <a href="{{ route('home.bibliotecario') }}" class="icon">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" width="28"
                height="28">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 9.75L12 3l9 6.75V21a1 1 0 01-1 1h-5.25V14.25h-5.5V22H4a1 1 0 01-1-1V9.75z" />
            </svg>
        </a>
    </div>

    <div class="container">
        <form class="card" style="width: 400px; padding: 20px; text-align: left;">
            <h2>Cadastrar Livro</h2>
            <label>Título:</label>
            <input type="text" name="titulo" required>

            <label>Autor:</label>
            <input type="text" name="autor" required>

            <label>ISBN:</label>
            <input type="text" name="isbn" required>

            <label>Editora:</label>
            <input type="text" name="editora" required>

            <label>Ano de Publicação:</label>
            <input type="number" name="ano" required>

            <label>Quantidade:</label>
            <input type="number" name="quantidade" required>

            <button type="submit">Salvar</button>
        </form>
    </div>
</body>

</html>