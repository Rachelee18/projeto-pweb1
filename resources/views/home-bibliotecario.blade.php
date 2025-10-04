@extends('app')

@section('title', 'Página Inicial - Bibliotecário')

@section('content')
<div class="home-container">
    <h2 class="welcome">Bem-vindo(a), <span>{{ session('bibliotecario_nome') }}</span></h2>

    <div class="quick-actions">
        <a href="{{ route('biblio.cadastrar') }}" class="action-card green">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v12m6-6H6" />
            </svg>
            <span>Cadastrar Livro</span>
        </a>

        <a href="{{ route('biblio.catalogo') }}" class="action-card black">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
            </svg>
            <span>Ver Catálogo</span>
        </a>

        <a href="{{ route('biblio.selecionar') }}" class="action-card yellow">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v6h6M20 20v-6h-6" />
            </svg>
            <span>Atualizar Livro</span>
        </a>

        <a href="{{ route('biblio.deletar') }}" class="action-card red">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
            <span>Deletar Livro</span>
        </a>

        <a href="{{ route('bibliotecario.emprestimos') }}" class="action-card blue">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4h16v16H4z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20" />
            </svg>
            <span>Registrar Empréstimo</span>
        </a>
    </div>
</div>
@endsection

@push('styles')
    @vite(['resources/css/home-bibliotecario.css'])
@endpush
