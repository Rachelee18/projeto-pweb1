<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Catálogo de Livros</title>
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
        <h2 style="color:white">Catálogo de Livros</h2>
    </div>

    <div style="padding:30px; text-align:center">
        <p>Aqui será exibida a lista de livros disponíveis na biblioteca.</p>
        <!-- Exemplo de tabela futura -->
        <table style="margin: 0 auto; border-collapse: collapse; width:80%; background:#fff;">
            <thead style="background:#3b6024; color:white;">
                <tr>
                    <th style="padding:10px;">Título</th>
                    <th style="padding:10px;">Autor</th>
                    <th style="padding:10px;">ISBN</th>
                    <th style="padding:10px;">Editora</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="padding:10px;">Exemplo Livro</td>
                    <td style="padding:10px;">Fulano de Tal</td>
                    <td style="padding:10px;">123456789</td>
                    <td style="padding:10px;">Editora X</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>
