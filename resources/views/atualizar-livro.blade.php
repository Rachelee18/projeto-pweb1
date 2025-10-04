@extends('app')

@section('title', 'Atualizar Livro')

@section('content')
<div class="form-container">
    <div class="form-card">

        @if(isset($livro))
            <h2>Editar Livro</h2>
            <form action="{{ route('biblio.atualizar.submit', $livro->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-grid">
                    <div class="form-group">
                        <label for="titulo">Título</label>
                        <input type="text" id="titulo" name="titulo" value="{{ $livro->titulo }}" placeholder="Digite o título" required>
                    </div>

                    <div class="form-group">
                        <label for="autor">Autor</label>
                        <input type="text" id="autor" name="autor" value="{{ $livro->autor }}" placeholder="Digite o autor" required>
                    </div>

                    <div class="form-group">
                        <label for="isbn">ISBN</label>
                        <input type="text" id="isbn" name="isbn" value="{{ $livro->isbn }}" placeholder="Digite o ISBN" required>
                    </div>

                    <div class="form-group">
                        <label for="editora">Editora</label>
                        <input type="text" id="editora" name="editora" value="{{ $livro->editora }}" placeholder="Digite a editora">
                    </div>

                    <div class="form-group">
                        <label for="ano_publicacao">Ano de Publicação</label>
                        <input type="number" id="ano_publicacao" name="ano_publicacao" value="{{ $livro->ano_publicacao }}" placeholder="Ex: 2022">
                    </div>

                    <div class="form-group">
                        <label for="quantidade">Quantidade</label>
                        <input type="number" id="quantidade" name="quantidade" value="{{ $livro->quantidade }}" placeholder="Qtd em estoque" required>
                    </div>

                    <div class="form-group">
                        <label for="capa">Capa do Livro</label>
                        <input type="file" id="capa" name="capa" accept="image/*" onchange="previewImage(event)">
                        <div class="cover-preview">
                            <img id="coverPreview" src="{{ $livro->capa_url ?? asset('images/cover/sem-capa.png') }}" alt="Capa do livro">
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn-submit">Salvar Alterações</button>
            </form>

        @elseif(isset($livros) || isset($todos_livros))
            <h2>Escolha o Livro para Atualizar</h2>
            <form action="{{ route('biblio.editar') }}" method="GET" class="form-group">
                <label for="id">Selecione o livro</label>
                <select name="id" id="id" required>
                    @foreach(($livros ?? $todos_livros) as $l)
                        <option value="{{ $l->id }}">{{ $l->id }} - {{ $l->titulo }}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn-submit">Editar</button>
            </form>

            <hr>

            <form action="{{ route('biblio.editar') }}" method="GET" class="form-group">
                <label for="nome_busca">Ou busque pelo nome:</label>
                <input type="text" name="nome" id="nome_busca" placeholder="Digite o nome do livro">
                <button type="submit" class="btn-submit">Buscar</button>
            </form>
        @else
            <p class="erro">Nenhum livro disponível para seleção.</p>
        @endif

    </div>
</div>
@endsection

@push('styles')
    @vite(['resources/css/atualizar-livro.css'])
@endpush

@push('scripts')
<script>
document.getElementById('isbn').addEventListener('blur', async function() {
    const isbn = this.value.replace(/[^0-9X]/gi, '');
    if (isbn.length < 10) return;

    try {
        const response = await fetch(`https://www.googleapis.com/books/v1/volumes?q=isbn:${isbn}`);
        const data = await response.json();

        if (data.totalItems > 0) {
            const book = data.items[0].volumeInfo;

            document.getElementById('titulo').value = book.title || '';
            document.getElementById('autor').value = (book.authors && book.authors.join(', ')) || '';
            document.getElementById('editora').value = book.publisher || '';
            document.getElementById('ano_publicacao').value = book.publishedDate ? book.publishedDate.substring(0,4) : '';
        } else {
            alert('Livro não encontrado pelo ISBN informado.');
        }
    } catch (error) {
        console.error('Erro ao buscar dados do ISBN:', error);
    }
});

function previewImage(event) {
    const [file] = event.target.files;
    if (file) {
        document.getElementById('coverPreview').src = URL.createObjectURL(file);
    }
}
</script>
@endpush