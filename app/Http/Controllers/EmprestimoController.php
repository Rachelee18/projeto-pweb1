<?php

namespace App\Http\Controllers;

use App\Models\Emprestimo;
use App\Models\Livro;
use App\Models\Aluno;
use Illuminate\Http\Request;

class EmprestimoController extends Controller
{
    # Lista todos os empréstimos.
     
    public function index()
    {
        $emprestimos = Emprestimo::with(['aluno', 'livro'])->get();
        return response()->json($emprestimos);
    }

    
    # Registra um novo empréstimo.
     
    public function store(Request $request)
    {
        $request->validate([
            'aluno_id' => 'required|exists:alunos,id',
            'livro_id' => 'required|exists:livros,id',
            'data_emprestimo' => 'required|date',
        ]);

        $emprestimo = Emprestimo::create([
            'aluno_id' => $request->aluno_id,
            'livro_id' => $request->livro_id,
            'data_emprestimo' => $request->data_emprestimo,
            'status' => 'emprestado'
        ]);

        return response()->json([
            'mensagem' => 'Empréstimo registrado com sucesso!',
            'dados' => $emprestimo
        ]);
    }

    
    #Lista os empréstimos de um aluno específico.
     
    public function meusEmprestimos($aluno_id)
    {
        $emprestimos = Emprestimo::with('livro')
            ->where('aluno_id', $aluno_id)
            ->get();

        return response()->json($emprestimos);
    }
}
