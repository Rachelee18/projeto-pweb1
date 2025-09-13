<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Pesquisar Livros</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>
<body>
    <div class="navbar">
        <a href="{{ route('home.aluno') }}" class="icon">
            <!-- Ícone voltar -->
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="white" stroke-width="2" viewBox="0 0 24 24">
                <path d="M15 18l-6-6 6-6"/>
            </svg>
        </a>
        <h2 style="color:white">Pesquisar Livro</h2>
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