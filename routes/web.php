<?php

use Illuminate\Support\Facades\Route;

// Página inicial (vai direto para select-role)
Route::get('/', function () {
    return view('select-role');
});

// ========== LOGIN ==========
Route::get('/login/bibliotecario', function () {
    return view('login-bibliotecario');
})->name('login.bibliotecario');

Route::get('/login/aluno', function () {
    return view('login-aluno');
})->name('login.aluno');

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