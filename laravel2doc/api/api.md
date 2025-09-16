# API Documentation

## Project: laravel/laravel

Laravel Version: v12.26.3

Generated: 16/09/2025, 20:20:27

## Table of Contents

- [web](#web)

## web

| Method | Endpoint | Handler | Description |
|--------|----------|---------|-------------|
| GET | / | function () {
    return view('select-role');
})->name('select.role');  // <-- aqui é o nome da rota


// ========== FORM DE LOGIN ==========
Route::get('/login/aluno', [AlunoController::class, 'showLoginForm' | List resource |
| POST | /login/aluno | AlunoController::class, 'login' | Create a new aluno |
| GET | /login/bibliotecario | BibliotecarioController::class, 'showLoginForm' | List bibliotecario |
| POST | /login/bibliotecario | BibliotecarioController::class, 'login' | Create a new bibliotecario |
| POST | /logout/aluno | AlunoController::class, 'logout' | Create a new aluno |
| POST | /logout/bibliotecario | BibliotecarioController::class, 'logout' | Create a new bibliotecario |
| GET | /home/aluno | function () {
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
Route::get('/pesquisar-livros', [AlunoController::class, 'pesquisarLivros' | List aluno |
| GET | /catalogo-livros | AlunoController::class, 'catalogoAluno' | List catalogo-livros |
| GET | /{aluno_id}/meus-emprestimos | EmprestimoController::class, 'meusEmprestimos' | Retrieve a specific meus-emprestimos |
| GET | /cadastrar-livro | function () {
    return view('cadastrar-livro');
})->name('biblio.cadastrar');

Route::post('/cadastrar-livro', [BibliotecarioController::class, 'cadastrarLivro' | List cadastrar-livro |
| GET | /catalogo-livros-biblio | function () {
    return view('catalogo-livros-biblio');
})->name('biblio.catalogo');

Route::get('/catalogo-livros-biblio', [BibliotecarioController::class, 'catalogo' | List catalogo-livros-biblio |
| GET | /atualizar-livro | BibliotecarioController::class, 'selecionarParaAtualizar' | List atualizar-livro |
| GET | /editar-livro | BibliotecarioController::class, 'edit' | List editar-livro |
| POST | /atualizar-livro/{id} | BibliotecarioController::class, 'update' | Create a new {id} |
| GET | /deletar-livro | BibliotecarioController::class, 'mostrarDeletar' | List deletar-livro |
| POST | /deletar-livro | BibliotecarioController::class, 'destroy' | Create a new deletar-livro |
| GET | /bibliotecario/emprestimos | EmprestimoController::class, 'create' | List emprestimos |
| POST | /emprestimos | EmprestimoController::class, 'store' | Create a new emprestimos |

### GET /

**Handler:** function () {
    return view('select-role');
})->name('select.role');  // <-- aqui é o nome da rota


// ========== FORM DE LOGIN ==========
Route::get('/login/aluno', [AlunoController::class, 'showLoginForm'

**Description:** List resource

---

### POST /login/aluno

**Handler:** AlunoController::class, 'login'

**Description:** Create a new aluno

---

### GET /login/bibliotecario

**Handler:** BibliotecarioController::class, 'showLoginForm'

**Description:** List bibliotecario

---

### POST /login/bibliotecario

**Handler:** BibliotecarioController::class, 'login'

**Description:** Create a new bibliotecario

---

### POST /logout/aluno

**Handler:** AlunoController::class, 'logout'

**Description:** Create a new aluno

---

### POST /logout/bibliotecario

**Handler:** BibliotecarioController::class, 'logout'

**Description:** Create a new bibliotecario

---

### GET /home/aluno

**Handler:** function () {
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
Route::get('/pesquisar-livros', [AlunoController::class, 'pesquisarLivros'

**Description:** List aluno

---

### GET /catalogo-livros

**Handler:** AlunoController::class, 'catalogoAluno'

**Description:** List catalogo-livros

---

### GET /{aluno_id}/meus-emprestimos

**Handler:** EmprestimoController::class, 'meusEmprestimos'

**Description:** Retrieve a specific meus-emprestimos

---

### GET /cadastrar-livro

**Handler:** function () {
    return view('cadastrar-livro');
})->name('biblio.cadastrar');

Route::post('/cadastrar-livro', [BibliotecarioController::class, 'cadastrarLivro'

**Description:** List cadastrar-livro

---

### GET /catalogo-livros-biblio

**Handler:** function () {
    return view('catalogo-livros-biblio');
})->name('biblio.catalogo');

Route::get('/catalogo-livros-biblio', [BibliotecarioController::class, 'catalogo'

**Description:** List catalogo-livros-biblio

---

### GET /atualizar-livro

**Handler:** BibliotecarioController::class, 'selecionarParaAtualizar'

**Description:** List atualizar-livro

---

### GET /editar-livro

**Handler:** BibliotecarioController::class, 'edit'

**Description:** List editar-livro

---

### POST /atualizar-livro/{id}

**Handler:** BibliotecarioController::class, 'update'

**Description:** Create a new {id}

---

### GET /deletar-livro

**Handler:** BibliotecarioController::class, 'mostrarDeletar'

**Description:** List deletar-livro

---

### POST /deletar-livro

**Handler:** BibliotecarioController::class, 'destroy'

**Description:** Create a new deletar-livro

---

### GET /bibliotecario/emprestimos

**Handler:** EmprestimoController::class, 'create'

**Description:** List emprestimos

---

### POST /emprestimos

**Handler:** EmprestimoController::class, 'store'

**Description:** Create a new emprestimos

---

