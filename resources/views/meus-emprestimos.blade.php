<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Meus Empréstimos</title>
    <link rel="stylesheet" href="{{ asset('css/catalogo-livros.css') }}">
</head>

<body>
    <div class="navbar">
        <a href="{{ route('home.aluno') }}" class="icon">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="white" stroke-width="2" viewBox="0 0 24 24">
                <path d="M3 12l9-9 9 9" />
                <path d="M9 21V12h6v9" />
            </svg>
        </a>

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
        <h1 style="text-align:center; color:#3b6024; margin-bottom: 20px;">Meus Empréstimos</h1>

        <table style="border-collapse: collapse; width: 80%; background: #fff;">
            <thead style="background:#3b6024; color:white;">
                <tr>
                    <th style="padding:10px;">Título</th>
                    <th style="padding:10px;">Autor</th>
                    <th style="padding:10px;">Data Empréstimo</th>
                    <th style="padding:10px;">Data Devolução</th>
                    <th style="padding:10px;">Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($emprestimos as $emp)
                    <tr>
                        <td style="padding:10px;">{{ $emp->livro->titulo }}</td>
                        <td style="padding:10px;">{{ $emp->livro->autor }}</td>
                        <td style="padding:10px;">
                            {{ \Carbon\Carbon::parse($emp->data_emprestimo)->format('d/m/Y') }}
                        </td>
                        <td style="padding:10px;">
                            @if($emp->data_devolucao)
                                {{ \Carbon\Carbon::parse($emp->data_devolucao)->format('d/m/Y') }}
                            @else
                                -
                            @endif
                        </td>
                        <td style="padding:10px;">{{ ucfirst($emp->status) }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" style="padding:10px; text-align:center;">Nenhum empréstimo encontrado.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>

</html>
