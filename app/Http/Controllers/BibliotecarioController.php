<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bibliotecario;
use App\Models\Livro;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class BibliotecarioController extends Controller
{
    // ==== LOGIN ====
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

    // ==== LOGOUT ====
    public function logout()
    {
        Session::forget(['bibliotecario_id', 'bibliotecario_nome']);
        return redirect()->route('select.role');
    }

    // ==== CATÁLOGO ====
    public function catalogo()
    {
        $livros = Livro::all();
        return view('catalogo-livros-biblio', compact('livros'));
    }

    // ==== CADASTRAR LIVRO ====
    public function cadastrarLivro(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'isbn' => 'required|string|max:50',
            'editora' => 'nullable|string|max:255',
            'ano_publicacao' => 'required|integer',
            'quantidade' => 'required|integer|min:0',
            'capa' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        $livro = new Livro();
        $livro->titulo = $request->titulo;
        $livro->autor = $request->autor;
        $livro->isbn = $request->isbn;
        $livro->editora = $request->editora;
        $livro->ano_publicacao = $request->ano_publicacao;
        $livro->quantidade = $request->quantidade;

        // upload da capa
        if ($request->hasFile('capa')) {
            $file = $request->file('capa');
            $filename = time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());
            $file->move(public_path('images/cover'), $filename);
            $livro->capa = 'images/cover/' . $filename;
        }

        $livro->save();

        return redirect()->route('home.bibliotecario')->with('success', 'Livro cadastrado com sucesso!');
    }

    // ==== ATUALIZAR LIVRO ====
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
            'isbn' => 'nullable|string|max:50',
            'editora' => 'nullable|string|max:255',
            'ano_publicacao' => 'required|integer',
            'quantidade' => 'required|integer|min:0',
            'capa' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        $livro = Livro::findOrFail($id);
        $livro->titulo = $request->titulo;
        $livro->autor = $request->autor;
        $livro->isbn = $request->isbn;
        $livro->editora = $request->editora;
        $livro->ano_publicacao = $request->ano_publicacao;
        $livro->quantidade = $request->quantidade;

        // upload da nova capa (se houver)
        if ($request->hasFile('capa')) {
            $file = $request->file('capa');
            $filename = time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());
            $file->move(public_path('images/cover'), $filename);
            $livro->capa = 'images/cover/' . $filename;
        }

        $livro->save();

        return redirect()->route('biblio.catalogo')->with('success', 'Livro atualizado com sucesso!');
    }

    // ==== DELETAR LIVRO ====
    public function mostrarDeletar()
    {
        $livros = Livro::all();
        return view('deletar-livro', compact('livros'));
    }

    public function destroy(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:livros,id'
        ]);

        $livro = Livro::findOrFail($request->id);

        // remove a capa do servidor se existir
        if ($livro->capa && file_exists(public_path($livro->capa))) {
            unlink(public_path($livro->capa));
        }

        $livro->delete();

        return redirect()->route('biblio.deletar')->with('success', 'Livro excluído com sucesso!');
    }
}