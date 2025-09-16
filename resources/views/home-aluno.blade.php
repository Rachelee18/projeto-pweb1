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
        <div class="logo">
            <h2>Bem-vindo(a), {{ session('aluno_nome') }}</h2>
        </div>

        <form action="{{ route('logout.bibliotecario') }}" method="POST" class="logout-form">
            @csrf
            <button type="submit" class="logout-icon">
                <a href="/select-role" class="icon" title="Sair">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="white" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M10 17l5-5-5-5"/>
                        <path d="M4 12h11"/>
                        <path d="M20 19V5a2 2 0 0 0-2-2H8"/>
                    </svg>
                </a>
            </button>
        </form>
    </div>

    <div class="container">
        <a href="{{ route('aluno.pesquisar') }}" class="card">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="white" stroke-width="2" viewBox="0 0 24 24">
                <circle cx="11" cy="11" r="8"/>
                <line x1="21" y1="21" x2="16.65" y2="16.65"/>
            </svg>
            Pesquisar Livro
        </a>

        <a href="{{ route('aluno.catalogo') }}" class="card">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="white" stroke-width="2" viewBox="0 0 24 24">
                <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/>
                <path d="M4 4h16v16H4z"/>
            </svg>
            Catálogo de Livros
        </a>

    <a href="{{ route('aluno.emprestimo', ['aluno_id' => session('aluno_id')]) }}" class="card">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="white" stroke-width="2" viewBox="0 0 24 24">
        <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/>
        <path d="M4 4h16v16H4z"/>
    </svg>
    Buscar_livro_aluno_id
    </a>

    </div>
</body>
</html>