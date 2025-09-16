<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Registrar Empréstimo</title>
    <link rel="stylesheet" href="{{ asset('css/emprestimo.css') }}">
</head>
<body>
    <div class="navbar">
        <a href="{{ route('home.bibliotecario') }}" class="icon">Home</a>
        <a href="/select-role" class="icon">Sair</a>
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
