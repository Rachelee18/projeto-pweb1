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
        <!-- Ícone Home -->
        <a href="{{ route('home.bibliotecario') }}" class="icon">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="white" stroke-width="2" viewBox="0 0 24 24">
                <path d="M3 12l9-9 9 9"/>
                <path d="M9 21V12h6v9"/>
            </svg>
        </a>
        <!-- Logout -->
        <a href="/select-role" class="icon" title="Sair"
            onclick="return confirm('Deseja encerrar a sessão?')">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="white" stroke-width="2" viewBox="0 0 24 24">
                <path d="M10 17l5-5-5-5"/>
                <path d="M4 12h11"/>
                <path d="M20 19V5a2 2 0 0 0-2-2H8"/>
            </svg>
        </a>
    </div>

    <div class="container">
        <form class="form-card" method="POST" action="{{ route('biblio.cadastrar.submit') }}">
            @csrf
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
            <input type="number" name="ano_publicacao" required>

            <label>Quantidade:</label>
            <input type="number" name="quantidade" required>

            <button type="submit">Salvar</button>
        </form>
    </div>
</body>
</html>