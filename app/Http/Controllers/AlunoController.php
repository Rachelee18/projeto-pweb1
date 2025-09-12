<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aluno;

class AlunoController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'senha' => 'required'
        ]);

        $aluno = Aluno::where('email', $request->email)->first();

        if ($aluno && $aluno->senha === $request->senha) { // use Hash::check se senha estiver hash
            session(['aluno_id' => $aluno->id]);
            return redirect()->route('home.aluno');
        }

        return back()->withErrors(['email' => 'Credenciais inválidas']);
    }
}