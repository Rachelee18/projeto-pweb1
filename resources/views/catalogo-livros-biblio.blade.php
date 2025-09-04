<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Livros</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>
<body>
    <div class="navbar">
        <a href="{{ route('home.bibliotecario') }}" class="icon">🏠</a>
    </div>

    <div class="container">
            <h2>Catálogo de Livros</h2>
            <ul style="list-style: none; padding: 0;">
                <li>📘 Dom Casmurro - Machado de Assis</li>
                <li>📗 O Cortiço - Aluísio Azevedo</li>
                <li>📕 Memórias Póstumas de Brás Cubas - Machado de Assis</li>
                <li>📙 Iracema - José de Alencar</li>
            </ul>
        </div>
    </div>
</body>
</html>
