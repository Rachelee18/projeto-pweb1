<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Aluno;
use App\Models\Bibliotecario;

class UsuarioSeeder extends Seeder
{
    public function run()
    {

        Aluno::create(attributes: [
            'nome' => 'Maria Clara',
            'email' => 'maria@ifce.edu.br',
            'senha' => '12345',
            'matricula' => '2025001',
            'curso' => 'Sistemas'
        ]);

        Aluno::create(attributes: [
            'nome' => 'Emilly Jullyane',
            'email' => 'emilly@ifce.edu.br',
            'senha' => '54321',
            'matricula' => '2025002',
            'curso' => 'Sistemas'
        ]);


        Bibliotecario::create(attributes: [
            'nome' => 'Guilherme Leandro',
            'email' => 'guilherme@ifce.edu.br',
            'senha' => 'admin123'
        ]);
    }
}

