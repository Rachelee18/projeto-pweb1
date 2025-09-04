<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Livro</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>
<body>
    <div class="navbar">
        <a href="{{ route('home.bibliotecario') }}" class="icon">🏠</a>
    </div>

    <div class="container">
        <form class="card" style="width: 400px; padding: 20px; text-align: left;">
            <h2>Atualizar Livro</h2>
            <label>ID do Livro:</label>
            <input type="number" name="id" required>
            
            <label>Novo Título:</label>
            <input type="text" name="titulo">
            
            <label>Novo Autor:</label>
            <input type="text" name="autor">
            
            <label>Novo ISBN:</label>
            <input type="text" name="isbn">
            
            <label>Nova Quantidade:</label>
            <input type="number" name="quantidade">
            
            <button type="submit">Atualizar</button>
        </form>
    </div>
</body>
</html>
