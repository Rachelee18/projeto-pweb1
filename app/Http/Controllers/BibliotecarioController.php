<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bibliotecario;
use App\Models\Livro;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class BibliotecarioController extends Controller
{
    public function showLoginForm()
    {
        return view('login-bibliotecario');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'senha' => 'required'
        ]);

        $user = Bibliotecario::where('email', $request->email)->first();

        if ($user && Hash::check($request->senha, $user->senha)) {
            Session::put('bibliotecario_id', $user->id);
            Session::put('bibliotecario_nome', $user->nome);
            return redirect()->route('home.bibliotecario');
        }

        return back()->withErrors(['email' => 'Credenciais inválidas']);
    }
    // ==== catalogo ===
    public function catalogo()
    {
        $livros = Livro::all();
        return view('catalogo-livros-biblio', compact('livros'));
    }


    // ==== LOGOUT ===
    public function logout()
    {
        Session::forget(['bibliotecario_id', 'bibliotecario_nome']);
        return redirect()->route('select.role'); // Redireciona para select-role
    }

    public function cadastrarLivro(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'isbn' => 'required|string|max:50',
            'editora' => 'required|string|max:255',
            'ano_publicacao' => 'required|integer',
            'quantidade' => 'required|integer',
        ]);

        Livro::create([
            'titulo' => $request->titulo,
            'autor' => $request->autor,
            'isbn' => $request->isbn,
            'editora' => $request->editora,
            'ano_publicacao' => $request->ano_publicacao,
            'quantidade' => $request->quantidade,
        ]);

        return redirect()->route('home.bibliotecario')->with('success', 'Livro cadastrado com sucesso!');
    }
}
