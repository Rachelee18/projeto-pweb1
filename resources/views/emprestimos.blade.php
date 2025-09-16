<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Registrar Empréstimo</title>
    <link rel="stylesheet" href="{{ asset('css/emprestimo.css') }}">
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
        <h2>Registrar Empréstimo</h2>

        @if(session('success'))
            <div class="success-message">{{ session('success') }}</div>
        @endif

        <form action="{{ route('emprestimos.store') }}" method="POST">
            @csrf

            <label for="aluno_id">Aluno:</label>
            <select name="aluno_id" id="aluno_id" required>
                <option value="">Selecione o aluno</option>
                @foreach($alunos as $aluno)
                    <option value="{{ $aluno->id }}">{{ $aluno->nome }}</option>
                @endforeach
            </select>

            <label for="livro_id">Livro:</label>
            <select name="livro_id" id="livro_id" required>
                <option value="">Selecione o livro</option>
                @foreach($livros as $livro)
                    <option value="{{ $livro->id }}">{{ $livro->titulo }}</option>
                @endforeach
            </select>

            <label for="data_emprestimo">Data de Empréstimo:</label>
            <input type="date" name="data_emprestimo" id="data_emprestimo" required>

            <label for="data_devolucao">Data de Devolução:</label>
            <input type="date" name="data_devolucao" id="data_devolucao" required>

            <button type="submit">Registrar</button>
        </form>
    </div>
</body>

</html>