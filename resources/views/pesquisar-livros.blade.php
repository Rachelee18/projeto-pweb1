<!DOCTYPE html> 
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Pesquisar Livros</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>
<body>
    <div class="navbar"> 
        <!-- Ícone Home -->
        <a href="{{ route('home.aluno') }}" class="icon">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="white" stroke-width="2" viewBox="0 0 24 24">
                <path d="M3 12l9-9 9 9"/>
                <path d="M9 21V12h6v9"/>
            </svg>
        </a>

        <!-- Ícone Usuário -->
        <span class="icon">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="white" stroke-width="2" viewBox="0 0 24 24">
                <circle cx="12" cy="8" r="4"/>
                <path d="M6 20c0-4 12-4 12 0"/>
            </svg>
        </span>

        <!-- Botão de Sair -->
        <a href="/select-role" class="icon" title="Sair">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="white" stroke-width="2" viewBox="0 0 24 24">
                <path d="M10 17l5-5-5-5"/>
                <path d="M4 12h11"/>
                <path d="M20 19V5a2 2 0 0 0-2-2H8"/>
            </svg>
        </a>
    </div>

    <div style="padding:30px; text-align:center">
        <form action="{{ route('aluno.pesquisar') }}" method="GET">
            <input type="text" name="query" placeholder="Digite título, autor, ISBN ou editora..." 
                   style="padding:10px; width:60%; border-radius:8px; border:1px solid #ccc;" value="{{ $query ?? '' }}">
            <div style="margin-top:10px;">
                <button type="submit"
                        style="padding:10px 20px; border-radius:8px; border:none; background:#3b6024; color:white; cursor:pointer;">
                    Buscar
                </button>
                <a href="{{ route('aluno.pesquisar') }}">
                    <button type="button" style="padding:10px 20px; border-radius:8px; border:none; background:#777; color:white; cursor:pointer;">
                        Limpar Pesquisa
                    </button>
                </a>
            </div>
        </form>
    </div>

    <!-- Mostrar resultados somente se houver pesquisa -->
    @if(isset($livros) && !empty($query))
        <div style="padding:30px; text-align:center">
            @if(count($livros) > 0)
                <h3>Resultados da pesquisa:</h3>
                <ul style="list-style:none; padding:0;">
                    @foreach($livros as $livro)
                        <li style="margin-bottom:10px; padding:10px; border:1px solid #ccc; border-radius:8px;">
                            <strong>{{ $livro->titulo }}</strong> - {{ $livro->autor }}<br>
                            ISBN: {{ $livro->isbn }} - Editora: {{ $livro->editora }} - Ano: {{ $livro->ano_publicacao }}
                        </li>
                    @endforeach
                </ul>
            @else
                <p>Nenhum livro encontrado.</p>
            @endif
        </div>
    @endif
</body>
</html>