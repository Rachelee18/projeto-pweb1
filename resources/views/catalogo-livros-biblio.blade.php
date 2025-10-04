@extends('app')

@section('title', 'Catálogo de Livros')

@section('content')
<div class="catalogo-container">
    <h2 class="section-title">Catálogo de Livros</h2>

    <!-- Barra de pesquisa -->
    <form action="{{ route('aluno.pesquisar') }}" method="GET" class="search-form">
        <input type="text" name="query" placeholder="Digite título, autor, ISBN ou editora..."
               value="{{ $query ?? '' }}">
        <div class="buttons">
            <button type="submit" class="btn buscar">Buscar</button>
            <a href="{{ route('aluno.pesquisar') }}" class="btn limpar">Limpar</a>
        </div>
    </form>

    @if($livros->isEmpty())
        <p class="no-books">Nenhum livro encontrado.</p>
    @else
        <div class="book-list" id="bookList">
            @foreach($livros as $livro)
                <div class="book-card">
                    <img src="{{ $livro->capa_url ?? asset('images/sem-capa.png') }}" alt="Capa do livro">
                    <div class="book-info">
                        <h4>{{ $livro->titulo }}</h4>
                        <p class="autor">{{ $livro->autor }}</p>
                        <p><strong>ISBN:</strong> {{ $livro->isbn }}</p>
                        <p><strong>Editora:</strong> {{ $livro->editora }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection

@push('styles')
    @vite(['resources/css/catalogo-livros.css', 'resources/css/pesquisar-livros.css'])
@endpush

@push('scripts')
<script>
document.getElementById('searchInput').addEventListener('keyup', function() {
    let filter = this.value.toLowerCase();
    let books = document.querySelectorAll('#bookList .book-card');
    books.forEach(book => {
        let text = book.textContent.toLowerCase();
        book.style.display = text.includes(filter) ? 'flex' : 'none';
    });
});
</script>
@endpush
