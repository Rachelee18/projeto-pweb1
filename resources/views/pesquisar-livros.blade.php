<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Pesquisar Livros</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>
<body>
    <div class="navbar">
        <a href="/home-aluno" class="icon">
            <!-- Ícone voltar -->
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="white" stroke-width="2" viewBox="0 0 24 24">
                <path d="M15 18l-6-6 6-6"/>
            </svg>
        </a>
        <h2 style="color:white">Pesquisar Livro</h2>
    </div>

    <div style="padding:30px; text-align:center">
        <form>
            <input type="text" placeholder="Digite título, autor, ISBN ou editora..." 
                   style="padding:10px; width:60%; border-radius:8px; border:1px solid #ccc;">
            <button type="submit" 
                    style="padding:10px 20px; border-radius:8px; border:none; background:#3b6024; color:white; cursor:pointer;">
                Buscar
            </button>
        </form>
    </div>
</body>
</html>
