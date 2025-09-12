<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livro;

class LivroController extends Controller
{

    public function index()
    {
        $livros = Livro::all();
        return view('catalogo-livros-biblio', compact('livros'));
    }


    public function create()
    {
        return view('cadastrar-livro');
    }


    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'ano_publicacao' => 'required|integer',
        ]);

        Livro::create($request->all());

        return redirect()->route('livros.index')->with('success', 'Livro cadastrado com sucesso!');
    }


    public function edit($id)
    {
        $livro = Livro::findOrFail($id);
        return view('atualizar-livro', compact('livro'));
    }



    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'ano_publicacao' => 'required|integer',
        ]);

        $livro = Livro::findOrFail($id);
        $livro->update($request->all());

        return redirect()->route('livros.index')->with('success', 'Livro atualizado com sucesso!');
    }


    public function destroy($id)
    {
        $livro = Livro::findOrFail($id);
        $livro->delete();

        return redirect()->route('livros.index')->with('success', 'Livro excluído com sucesso!');
    }


    public function catalogoAluno()
    {
        $livros = Livro::all();
        return view('catalogo-livros', compact('livros'));
    }


    public function pesquisar(Request $request)
    {
        $busca = $request->input('q');
        $livros = Livro::where('titulo', 'like', "%$busca%")
            ->orWhere('autor', 'like', "%$busca%")
            ->get();

        return view('pesquisar-livros', compact('livros', 'busca'));
    }
}