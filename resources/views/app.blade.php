<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BibWeb - @yield('title', 'Biblioteca IFCE')</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body>
    <header>
        <a href="{{ url('/') }}" class="logo">BibWeb</a>
        <nav>
            <a href="{{ route('home.aluno') }}">Início</a>
            <a href="{{ route('emprestimos.store') }}">Empréstimos</a>
            <a href="{{ route('aluno.catalogo') }}">Livros</a>
            <a href="{{ route('logout.aluno') }}">Sair</a>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        © 2025 BibWeb - Sistema de Empréstimos da Biblioteca IFCE
    </footer>

    <script>
        document.addEventListener('keydown', (e) => {
            if (e.key.toLowerCase() === 'd') {
                document.body.classList.toggle('dark');
            }
        });
    </script>
    @stack('scripts')
</body>
</html>