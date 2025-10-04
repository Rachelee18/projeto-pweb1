<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\BibliotecarioController;
use App\Http\Controllers\EmprestimoController;

// ========== PÁGINA INICIAL ==========
Route::get('/', fn() => view('select-role'))->name('select.role');


// ========== LOGIN & LOGOUT ==========
Route::prefix('login')->group(function () {
    Route::get('/aluno', [AlunoController::class, 'showLoginForm'])->name('login.aluno');
    Route::post('/aluno', [AlunoController::class, 'login'])->name('login.aluno.submit');

    Route::get('/bibliotecario', [BibliotecarioController::class, 'showLoginForm'])->name('login.bibliotecario');
    Route::post('/bibliotecario', [BibliotecarioController::class, 'login'])->name('login.bibliotecario.submit');
});

Route::post('/logout/aluno', [AlunoController::class, 'logout'])->name('logout.aluno');
Route::post('/logout/bibliotecario', [BibliotecarioController::class, 'logout'])->name('logout.bibliotecario');


// ========== HOME ==========
Route::get('/home/aluno', function () {
    if (!session()->has('aluno_id')) {
        return redirect()->route('login.aluno');
    }
    return view('home-aluno');
})->name('home.aluno');

Route::get('/home/bibliotecario', function () {
    if (!session()->has('bibliotecario_id')) {
        return redirect()->route('login.bibliotecario');
    }
    return view('home-bibliotecario');
})->name('home.bibliotecario');


// ========== FUNCIONALIDADES DO ALUNO ==========
Route::prefix('aluno')->group(function () {
    Route::get('/pesquisar-livros', [AlunoController::class, 'pesquisarLivros'])->name('aluno.pesquisar');
    Route::get('/catalogo-livros', [AlunoController::class, 'catalogoAluno'])->name('aluno.catalogo');

    // Meus empréstimos
    Route::get('/{aluno_id}/meus-emprestimos', [EmprestimoController::class, 'meusEmprestimos'])
        ->name('aluno.emprestimo');

    // Versão AJAX para SPA-like
    Route::get('/{aluno_id}/emprestimos/ajax', [EmprestimoController::class, 'listarAjax'])
        ->name('aluno.emprestimos.ajax');
});


// ========== FUNCIONALIDADES DO BIBLIOTECÁRIO ==========
Route::prefix('bibliotecario')->group(function () {
    // Catálogo
    Route::get('/catalogo-livros', [BibliotecarioController::class, 'catalogo'])->name('biblio.catalogo');

    // Cadastro de livro
    Route::get('/cadastrar-livro', fn() => view('cadastrar-livro'))->name('biblio.cadastrar');
    Route::post('/cadastrar-livro', [BibliotecarioController::class, 'cadastrarLivro'])
        ->name('biblio.cadastrar.submit');

    // Atualizar livro
    Route::get('/atualizar-livro', [BibliotecarioController::class, 'selecionarParaAtualizar'])->name('biblio.selecionar');
    Route::get('/editar-livro', [BibliotecarioController::class, 'edit'])->name('biblio.editar');
    Route::post('/atualizar-livro/{id}', [BibliotecarioController::class, 'update'])->name('biblio.atualizar.submit');

    // Deletar livro
    Route::get('/deletar-livro', [BibliotecarioController::class, 'mostrarDeletar'])->name('biblio.deletar');
    Route::post('/deletar-livro', [BibliotecarioController::class, 'destroy'])->name('biblio.deletar.submit');

    // Empréstimos
    Route::get('/emprestimos', [EmprestimoController::class, 'create'])->name('bibliotecario.emprestimos');
});

// Salvar empréstimo (fora do grupo pq é POST geral)
Route::post('/emprestimos', [EmprestimoController::class, 'store'])->name('emprestimos.store');