<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Livro</title>
    <link rel="stylesheet" href="{{ asset('css/atualizar-livro.css') }}">
</head>

<body>
    <div class="navbar">
        <!-- Ícone Home -->
        <a href="{{ route('home.bibliotecario') }}" class="icon" title="Home">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="white" stroke-width="2" viewBox="0 0 24 24">
                <path d="M3 12l9-9 9 9" />
                <path d="M9 21V12h6v9" />
            </svg>
        </a>

        <!-- Logout -->
        <a href="/select-role" class="icon" title="Sair" onclick="return confirm('Deseja encerrar a sessão?')">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="white" stroke-width="2" viewBox="0 0 24 24">
                <path d="M10 17l5-5-5-5" />
                <path d="M4 12h11" />
                <path d="M20 19V5a2 2 0 0 0-2-2H8" />
            </svg>
        </a>
    </div>

    <div class="container">
        <div class="card">

            @if(isset($livro))
                <!-- Formulário de atualização -->
                <h2>Atualizar Livro: {{ $livro->titulo }}</h2>
                <form action="{{ route('biblio.atualizar.submit', $livro->id) }}" method="POST">
                    @csrf
                    <label for="titulo">Título:</label>
                    <input type="text" id="titulo" name="titulo" value="{{ $livro->titulo }}" required>

                    <label for="autor">Autor:</label>
                    <input type="text" id="autor" name="autor" value="{{ $livro->autor }}" required>

                    <label for="isbn">ISBN:</label>
                    <input type="text" id="isbn" name="isbn" value="{{ $livro->isbn }}" required>

                    <label for="quantidade">Quantidade:</label>
                    <input type="number" id="quantidade" name="quantidade" value="{{ $livro->quantidade }}" required>

                    <button type="submit">Atualizar</button>
                </form>

            @elseif(isset($livros))
                <!-- Resultados da pesquisa por nome -->
                <h2>Escolha o livro para atualizar</h2>
                <form action="{{ route('biblio.editar') }}" method="GET">
                    <label for="id">Selecione o livro:</label>
                    <select name="id" id="id" required>
                        @foreach($livros as $l)
                            <option value="{{ $l->id }}">{{ $l->id }} - {{ $l->titulo }}</option>
                        @endforeach
                    </select>
                    <button type="submit">Editar</button>
                </form>

            @elseif(isset($todos_livros))
                <!-- Seleção inicial de livro -->
                <h2>Qual livro deseja atualizar?</h2>

                <form action="{{ route('biblio.editar') }}" method="GET">
                    <label for="id_selecao">ID do livro:</label>
                    <select name="id" id="id_selecao" required>
                        @foreach($todos_livros as $l)
                            <option value="{{ $l->id }}">{{ $l->id }} - {{ $l->titulo }}</option>
                        @endforeach
                    </select>
                    <button type="submit">Editar</button>
                </form>

                <hr>

                <form action="{{ route('biblio.editar') }}" method="GET">
                    <label for="nome_busca">Ou busque pelo nome:</label>
                    <input type="text" name="nome" id="nome_busca" placeholder="Digite o nome do livro">
                    <button type="submit">Buscar</button>
                </form>

            @else
                <p class="erro">Nenhum livro disponível para seleção.</p>
            @endif

        </div>
    </div>
</body>

</html>