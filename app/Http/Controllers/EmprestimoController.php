<?php

namespace App\Http\Controllers;

use App\Models\Emprestimo;
use App\Models\Livro;
use App\Models\Aluno;
use Illuminate\Http\Request;

class EmprestimoController extends Controller
{
    # Lista todos os em
    public function index()
    {
        $emprestimos = Emprestimo::with(['aluno', 'livro'])->get();
        return response()->json($emprestimos);
    }

    //abaixo é a parte de emprestimo para o biblio
    public function create()
    {
        $alunos = Aluno::all();
        $livros = Livro::all();

        return view('emprestimos', compact('alunos', 'livros'));
    }
    //salvando o emp no banco 
    public function store(Request $request)
    {
        $request->validate([
            'aluno_id' => 'required|exists:alunos,id',
            'livro_id' => 'required|exists:livros,id',
            'data_emprestimo' => 'required|date',
            'data_devolucao' => 'required|date|after_or_equal:data_emprestimo',
        ]);

        Emprestimo::create([
            'aluno_id' => $request->aluno_id,
            'livro_id' => $request->livro_id,
            'data_emprestimo' => $request->data_emprestimo,
            'data_devolucao' => $request->data_devolucao,
            'status' => 'ativo',
        ]);

        return redirect()->route('bibliotecario.emprestimos')
            ->with('success', 'Empréstimo registrado com sucesso!');
    }


    #Lista os empréstimos de um aluno específico.

    public function meusEmprestimos($aluno_id)
    {
        
        $emprestimos = Emprestimo::with('livro')
            ->where('aluno_id', $aluno_id)
            ->get();
        //return response()->json($emprestimos);
        // retorna a view específica do aluno, só com os empréstimos dele, melhor do que usar o json
        return view('meus-emprestimos', compact('emprestimos'));

    }
}
