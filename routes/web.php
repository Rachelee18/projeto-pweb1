<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\BibliotecarioController;
use App\Http\Controllers\EmprestimoController;

// Página inicial (vai direto para select-role)
Route::get('/', function () {
    return view('select-role');
})->name('select.role');  // <-- aqui é o nome da rota


// ========== FORM DE LOGIN ==========
Route::get('/login/aluno', [AlunoController::class, 'showLoginForm'])->name('login.aluno');
Route::post('/login/aluno', [AlunoController::class, 'login'])->name('login.aluno.submit');

Route::get('/login/bibliotecario', [BibliotecarioController::class, 'showLoginForm'])->name('login.bibliotecario');
Route::post('/login/bibliotecario', [BibliotecarioController::class, 'login'])->name('login.bibliotecario.submit');

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

// ========== FUNCIONALIDADES ALUNO ==========
Route::get('/pesquisar-livros', [AlunoController::class, 'pesquisarLivros'])->name('aluno.pesquisar');

Route::get('/catalogo-livros', [AlunoController::class, 'catalogoAluno'])->name('aluno.catalogo');

// essa é uma funcionalidade bonus
//Route::get('/{aluno_id}/emprestimos', [EmprestimoController::class, 'meusEmprestimos'])->name('aluno.emprestimo');
//so tirar o comentario


// ========== FUNCIONALIDADES BIBLIOTECÁRIO ==========
Route::get('/cadastrar-livro', function () {
    return view('cadastrar-livro');
})->name('biblio.cadastrar');

Route::post('/cadastrar-livro', [BibliotecarioController::class, 'cadastrarLivro'])->name('biblio.cadastrar.submit');


Route::get('/catalogo-livros-biblio', function () {
    return view('catalogo-livros-biblio');
})->name('biblio.catalogo');

Route::get('/catalogo-livros-biblio', [BibliotecarioController::class, 'catalogo'])->name('biblio.catalogo');


Route::get('/atualizar-livro', [BibliotecarioController::class, 'selecionarParaAtualizar'])
    ->name('biblio.selecionar');

Route::get('/editar-livro', [BibliotecarioController::class, 'edit'])
    ->name('biblio.editar');

Route::post('/atualizar-livro/{id}', [BibliotecarioController::class, 'update'])
    ->name('biblio.atualizar.submit');


Route::get('/deletar-livro', function () {
    return view('deletar-livro');
})->name('biblio.deletar');

// outra funcionalidade bonus para o biblio de emprestar 
Route::get('/bibliotecario/emprestimos', [EmprestimoController::class, 'create'])
    ->name('bibliotecario.emprestimos');

// Salvar empréstimo
Route::post('/emprestimos', [EmprestimoController::class, 'store'])
    ->name('emprestimos.store');