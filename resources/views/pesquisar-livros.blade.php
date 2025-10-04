@extends('app')

@section('title', 'Pesquisar Livros')

@section('content')
<div class="pesquisa-container">
    <h2 class="section-title">Pesquisar Livros</h2>

    <form action="{{ route('aluno.pesquisar') }}" method="GET" class="search-form">
        <input type="text" name="query" placeholder="Digite título, autor, ISBN ou editora..."
               value="{{ $query ?? '' }}">
        <div class="buttons">
            <button type="submit" class="btn buscar">Buscar</button>
            <a href="{{ route('aluno.pesquisar') }}" class="btn limpar">Limpar</a>
        </div>
    </form>

    @if(isset($livros) && !empty($query))
        <div class="resultados">
            @if(count($livros) > 0)
                <h3 class="result-title">Resultados para "{{ $query }}"</h3>
                <div class="book-list">
                    @foreach($livros as $livro)
                        <div class="book-card">
                            <img src="{{ $livro->capa_url ?? asset('images/cover/sem-capa.png') }}" alt="Capa do livro">
                            <div class="book-info">
                                <h4>{{ $livro->titulo }}</h4>
                                <p class="autor">{{ $livro->autor }}</p>
                                <p><strong>ISBN:</strong> {{ $livro->isbn }}</p>
                                <p><strong>Editora:</strong> {{ $livro->editora }}</p>
                                <p><strong>Ano:</strong> {{ $livro->ano_publicacao }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="no-books">Nenhum livro encontrado.</p>
            @endif
        </div>
    @endif
</div>
@endsection

@push('styles')
    @vite(['resources/css/pesquisar-livros.css'])
@endpush
