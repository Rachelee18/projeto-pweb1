<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bibliotecario;

class BibliotecarioController extends Controller
{
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
}