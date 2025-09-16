<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Bibliotecário</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>
<body>
    <div class="navbar">
        <div class="logo">
            <h2>Bem-vindo(a), {{ session('bibliotecario_nome') }}</h2>
        </div>

        <form action="{{ route('logout.bibliotecario') }}" method="POST" class="logout-form">
            @csrf
            <button type="submit" class="logout-icon">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="white" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M10 17l5-5-5-5"/>
                    <path d="M4 12h11"/>
                    <path d="M20 19V5a2 2 0 0 0-2-2H8" />
                </svg>
            </button>
        </form>
    </div>

    <div class="container">
        <a href="{{ route('biblio.cadastrar') }}" class="card">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v12m6-6H6" />
            </svg>
            <span>Cadastrar Livro</span>
        </a>

        <a href="{{ route('biblio.catalogo') }}" class="card">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
            </svg>
            <span>Ver Catálogo</span>
        </a>

        <a href="{{ route('biblio.selecionar') }}" class="card">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v6h6M20 20v-6h-6" />
            </svg>
            <span>Atualizar Livro</span>
        </a>

        <a href="{{ route('biblio.deletar') }}" class="card">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
            <span>Deletar Livro</span>
        </a>
    </div>
</body>
</html>