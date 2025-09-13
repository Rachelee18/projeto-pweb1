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
    
//  ====  LOGOUT ====
    public function logout()
    {
        Session::forget(['aluno_id', 'aluno_nome']);
        return redirect()->route('login.aluno');
    }
}