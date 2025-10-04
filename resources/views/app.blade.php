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
            @if(session()->has('aluno_id'))
                <a href="{{ route('home.aluno') }}">Início</a>
                <a href="{{ route('aluno.emprestimo', ['aluno_id' => session('aluno_id')]) }}">Meus Empréstimos</a>
                <a href="{{ route('aluno.catalogo') }}">Catálogo</a>
                <form action="{{ route('logout.aluno') }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="logout-btn">Sair</button>
                </form>
            @elseif(session()->has('bibliotecario_id'))
                <a href="{{ route('home.bibliotecario') }}">Início</a>
                <a href="{{ route('bibliotecario.emprestimos') }}">Gerenciar Empréstimos</a>
                <a href="{{ route('biblio.catalogo') }}">Livros</a>
                <a href="{{ route('biblio.cadastrar') }}">Cadastrar Livro</a>
                <form action="{{ route('logout.bibliotecario') }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="logout-btn">Sair</button>
                </form>
            @else
                <a href="{{ route('login.aluno') }}">Login Aluno</a>
                <a href="{{ route('login.bibliotecario') }}">Login Bibliotecário</a>
            @endif
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
            if (e.target.matches('input, textarea')) return;
            if (e.key.toLowerCase() === 'd') {
                document.body.classList.toggle('dark');
            }
        });
    </script>
    @stack('scripts')
</body>
</html>
