<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Aluno</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>
<body>
    <div class="navbar"> 
        <div class="icon">☰</div>

        <!-- Ícone aluno -->
        <span class="icon">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="white" stroke-width="2" viewBox="0 0 24 24">
                <circle cx="12" cy="8" r="4"/>
                <path d="M6 20c0-4 12-4 12 0"/>
            </svg>
        </span>

        <!-- Ícone sair -->
        <a href="/select-role" class="icon">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="white" stroke-width="2" viewBox="0 0 24 24">
                <path d="M10 17l5-5-5-5"/>
                <path d="M4 12h11"/>
                <path d="M20 19V5a2 2 0 0 0-2-2H8"/>
            </svg>
        </a>
    </div>

    <div class="container">
        <a href="/pesquisar-livros" class="card">
            <!-- Ícone pesquisar -->
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="white" stroke-width="2" viewBox="0 0 24 24">
                <circle cx="11" cy="11" r="8"/>
                <line x1="21" y1="21" x2="16.65" y2="16.65"/>
            </svg>
            Pesquisar Livro
        </a>

        <a href="/catalogo-livros" class="card">
            <!-- Ícone catálogo -->
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="white" stroke-width="2" viewBox="0 0 24 24">
                <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/>
                <path d="M4 4h16v16H4z"/>
            </svg>
            Catálogo de Livros
        </a>
    </div>
</body>
</html>
