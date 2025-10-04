@extends('app')

@section('title', 'Cadastrar Livro')

@section('content')
<div class="form-container">
    <form class="form-card" method="POST" action="{{ route('biblio.cadastrar.submit') }}">
        @csrf
        <h2>Cadastrar Livro</h2>

        <div class="form-grid">
            <div class="form-group">
                <label for="isbn">ISBN</label>
                <div class="input-icon special-isbn">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path d="M4 4h16v16H4z"/>
                        <path d="M9 9h6v6H9z"/>
                    </svg>
                    <input type="text" id="isbn" name="isbn" placeholder="Digite ou escaneie o ISBN" required>
                </div>
            </div>

            <div class="form-group">
                <label for="titulo">Título</label>
                <div class="input-icon">
                    <input type="text" id="titulo" name="titulo" placeholder="Ex: Estruturas de Dados" required>
                </div>
            </div>

            <div class="form-group">
                <label for="autor">Autor</label>
                <div class="input-icon">
                    <input type="text" id="autor" name="autor" placeholder="Ex: Robert Lafore" required>
                </div>
            </div>

            <div class="form-group">
                <label for="editora">Editora</label>
                <div class="input-icon">
                    <input type="text" id="editora" name="editora" placeholder="Ex: Pearson" required>
                </div>
            </div>

            <div class="form-group">
                <label for="ano_publicacao">Ano de Publicação</label>
                <div class="input-icon">
                    <input type="number" id="ano_publicacao" name="ano_publicacao" placeholder="Ex: 2021" required>
                </div>
            </div>

            <div class="form-group">
                <label for="quantidade">Quantidade</label>
                <div class="input-icon">
                    <input type="number" id="quantidade" name="quantidade" placeholder="Ex: 10" required>
                </div>
            </div>

            <div class="form-group">
                <label for="capa">Capa do Livro</label>
                <input type="file" id="capa" name="capa" accept="image/*" onchange="previewImage(event)">
                <div class="cover-preview">
                    <img id="coverPreview" src="{{ $livro->capa_url ?? asset('images/cover/sem-capa.png') }}" alt="Capa do livro">
                </div>
            </div>
        </div>

        <button type="submit" class="btn-submit">Salvar</button>
    </form>
</div>
@endsection

@push('styles')
    @vite(['resources/css/cadastrar-livro.css'])
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