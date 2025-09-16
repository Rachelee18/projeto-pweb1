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

    // Tela inicial de atualização: mostra seleção, e tambem o $todos_livros = Livro::all(); que é pra mostrar todos os livrs
    public function selecionarParaAtualizar()
    {
        $todos_livros = Livro::all();
        return view('atualizar-livro', compact('todos_livros'));
    }

    public function edit(Request $request)
    {
        if ($request->has('id')) {
            $livro = Livro::findOrFail($request->id);
            return view('atualizar-livro', compact('livro'));
        }

        if ($request->has('nome')) {
            $livros = Livro::where('titulo', 'like', "%{$request->nome}%")->get();
            return view('atualizar-livro', compact('livros'));
        }

        return redirect()->route('biblio.selecionar')->with('erro', 'Nenhum livro selecionado.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'isbn' => 'required|string|max:20',
            'quantidade' => 'required|integer',
        ]);

        $livro = Livro::findOrFail($id);
        $livro->update($request->all());

        return redirect()->route('biblio.catalogo')->with('success', 'Livro atualizado com sucesso!');
    }

    public function mostrarDeletar()
    {
        $livros = Livro::all(); // busca todos os livros
        return view('deletar-livro', compact('livros')); // envia para a view
    }

    public function destroy(Request $request)
    {
    $request->validate([
        'id' => 'required|integer|exists:livros,id'
    ]);

    $livro = Livro::findOrFail($request->id);
    $livro->delete();

    return redirect()->route('biblio.deletar')->with('success', 'Livro excluído com sucesso!');
    }


}