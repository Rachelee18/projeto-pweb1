<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\BibliotecarioController;

// Página inicial (vai direto para select-role)
Route::get('/', function () {
    return view('select-role');
});


// ========== FORM DE LOGIN ==========
Route::get('/login/aluno', [AlunoController::class, 'showLoginForm'])->name('login.aluno');
Route::post('/login/aluno', [AlunoController::class, 'login'])->name('login.aluno.submit');

Route::get('/login/bibliotecario', [BibliotecarioController::class, 'showLoginForm'])->name('login.bibliotecario');
Route::post('/login/bibliotecario', [BibliotecarioController::class, 'login'])->name('login.bibliotecario.submit');

Route::post('/logout/aluno', [AlunoController::class, 'logout'])->name('logout.aluno');
Route::post('/logout/bibliotecario', [BibliotecarioController::class, 'logout'])->name('logout.bibliotecario');


// ========== HOME ==========
Route::get('/home/bibliotecario', function () {
    return view('home-bibliotecario');
})->name('home.bibliotecario');

Route::get('/home/aluno', function () {
    return view('home-aluno');
})->name('home.aluno');


// ========== FUNCIONALIDADES ALUNO ==========
Route::get('/pesquisar-livros', function () {
    return view('pesquisar-livros');
})->name('aluno.pesquisar');

Route::get('/catalogo-livros', function () {
    return view('catalogo-livros');
})->name('aluno.catalogo');


// ========== FUNCIONALIDADES BIBLIOTECÁRIO ==========
Route::get('/cadastrar-livro', function () {
    return view('cadastrar-livro');
})->name('biblio.cadastrar');

Route::get('/catalogo-livros-biblio', function () {
    return view('catalogo-livros-biblio');
})->name('biblio.catalogo');

Route::get('/atualizar-livro', function () {
    return view('atualizar-livro');
})->name('biblio.atualizar');

Route::get('/deletar-livro', function () {
    return view('deletar-livro');
})->name('biblio.deletar');