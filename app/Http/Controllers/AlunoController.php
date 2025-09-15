<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aluno;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AlunoController extends Controller
{
    public function showLoginForm()
    {
        return view('login-aluno');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'senha' => 'required'
        ]);

        $aluno = Aluno::where('email', $request->email)->first();

        if ($aluno && Hash::check($request->senha, $aluno->senha)) {
            Session::put('aluno_id', $aluno->id);
            Session::put('aluno_nome', $aluno->nome);
            return redirect()->route('home.aluno');
        }

        return back()->withErrors(['email' => 'Credenciais inválidas']);
    }

    public function pesquisarLivros(Request $request)
    {
        $query = $request->input('query');

        $livros = \App\Models\Livro::where('titulo', 'like', "%{$query}%")
            ->orWhere('autor', 'like', "%{$query}%")
            ->orWhere('isbn', 'like', "%{$query}%")
            ->orWhere('editora', 'like', "%{$query}%")
            ->get();

        return view('pesquisar-livros', compact('livros', 'query'));
    }

    // ==== Catalogo ====
    public function catalogoAluno()
    {
        $livros = \App\Models\Livro::all();
        return view('catalogo-livros', compact('livros'));
    }

    // ==== LOGOUT ====
    public function logout()
    {
        // Remove dados da sessão
        Session::forget(['aluno_id', 'aluno_nome']);
        return redirect()->route('select.role');
    }
}