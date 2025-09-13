<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bibliotecario;
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

        if ($user && $user->senha === $request->senha) {
            session(['bibliotecario_id' => $user->id]);
            return redirect()->route('home.bibliotecario');
        }

        return back()->withErrors(['email' => 'Credenciais inválidas']);
    }
    public function logout()
    {
        Session::forget(['bibliotecario_id', 'bibliotecario_nome']);
        return redirect()->route('login.bibliotecario');
    }
}