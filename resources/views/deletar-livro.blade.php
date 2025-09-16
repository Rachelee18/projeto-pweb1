<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deletar Livro</title>
    <link rel="stylesheet" href="{{ asset('css/deletar-livro.css') }}">
</head>
<body>
    <div class="navbar">
        <a href="{{ route('home.bibliotecario') }}" class="icon">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="white" stroke-width="2" viewBox="0 0 24 24">
                <path d="M3 12l9-9 9 9" />
                <path d="M9 21V12h6v9" />
            </svg>
        </a>


        <!-- Ícone de logout -->
        <a href="{{ route('select.role') }}" class="icon" title="Sair"
            onclick="return confirm('Deseja encerrar a sessão?')">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="white" stroke-width="2" viewBox="0 0 24 24">
                <path d="M10 17l5-5-5-5" />
                <path d="M4 12h11" />
                <path d="M20 19V5a2 2 0 0 0-2-2H8" />
            </svg>
        </a>
    </div>

    <div class="container">
        <h2>Deletar Livro</h2>

        @if(session('success'))
            <div style="color: green; margin-bottom: 15px;">
                {{ session('success') }}
            </div>
        @endif

        <p>Lista de livros disponíveis:</p>
        <ul>
            @foreach($livros as $livro)
                <li>ID: {{ $livro->id }} - {{ $livro->titulo }} ({{ $livro->autor }})</li>
            @endforeach
        </ul>

        <form method="POST" action="{{ route('biblio.deletar.submit') }}" style="margin-top: 20px;">
            @csrf
            <label for="id">ID do Livro que deseja deletar:</label>
            <input type="number" name="id" id="id" required>
            <button type="submit" style="background-color: darkred; color: white; border: none; padding: 5px 10px; cursor: pointer;">
                Excluir
            </button>
        </form>
    </div>
</body>
</html>