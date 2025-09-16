<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Catálogo de Livros</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>

<body>
    <div class="navbar">
        <a href="{{ route('home.aluno') }}" class="icon">
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

    <!-- Container para a tabela -->
    <div class="container">
        <table style="border-collapse: collapse; width: 80%; background: #fff;">
            <thead style="background:#3b6024; color:white;">
                <tr>
                    <th style="padding:10px;">Título</th>
                    <th style="padding:10px;">Autor</th>
                    <th style="padding:10px;">ISBN</th>
                    <th style="padding:10px;">Editora</th>
                </tr>
            </thead>
            <tbody>
                @foreach($livros as $livro)
                    <tr>
                        <td style="padding:10px;">{{ $livro->titulo }}</td>
                        <td style="padding:10px;">{{ $livro->autor }}</td>
                        <td style="padding:10px;">{{ $livro->isbn }}</td>
                        <td style="padding:10px;">{{ $livro->editora }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>