@php
    class Emprestimo {
        public $livros;

        public function isEmpty(): bool {
            return true;
        }
    }
    $emprestimos = new Emprestimo();
@endphp

@extends('app')

@section('title', 'Página Inicial - Aluno')

@section('content')
<div class="home-container">
    <h2 class="welcome">Bem-vindo(a), <span>{{ session('aluno_nome') }}</span></h2>

    <div class="quick-actions">
        <a href="{{ route('aluno.pesquisar') }}" class="action-card green">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <circle cx="11" cy="11" r="8"/>
                <line x1="21" y1="21" x2="16.65" y2="16.65"/>
            </svg>
            <span>Pesquisar Livro</span>
        </a>

        <a href="{{ route('aluno.catalogo') }}" class="action-card black">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/>
                <path d="M4 4h16v16H4z"/>
            </svg>
            <span>Catálogo de Livros</span>
        </a>

        <a href="{{ route('aluno.emprestimos.ajax', ['aluno_id' => session('aluno_id')]) }}" 
        class="action-card red" 
        id="load-emprestimos">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/>
                <path d="M4 4h16v16H4z"/>
            </svg>
            <span>Meus Empréstimos</span>
        </a>


    </div>

    <div class="section">
        <div id="emprestimos-content"></div>
    </div>
</div>
@endsection

@push('styles')
    @vite(['resources/css/home-aluno.css'])
@endpush

@push('scripts')
<script>
document.getElementById('load-emprestimos').addEventListener('click', async (e) => {
    e.preventDefault();
    const url = e.currentTarget.getAttribute('href');
    const contentBox = document.getElementById('emprestimos-content');

    contentBox.innerHTML = "<p>Carregando seus empréstimos...</p>";

    try {
        const resp = await fetch(url);
        const html = await resp.text();
        contentBox.innerHTML = html;
    } catch (err) {
        contentBox.innerHTML = "<p style='color:red'>Erro ao carregar empréstimos.</p>";
    }
});
</script>
@endpush

