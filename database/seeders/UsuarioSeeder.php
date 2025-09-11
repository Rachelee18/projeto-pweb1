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

            
        Aluno::create(attributes: [
        'nome' => 'Caíque Fernandes',
        'email' => 'Caique@ifce.edu.br',
        'senha' => '11223',
        'matricula' => '2025003',
        'curso' => 'Sistemas'
        ]);

        Aluno::create(attributes: [
            'nome' => 'Ana Beatriz',
            'email' => 'ana@ifce.edu.br',
            'senha' => '33445',
            'matricula' => '2025004',
            'curso' => 'Sistemas'
        ]);

        Aluno::create(attributes: [
            'nome' => 'Lucas Gabriel',
            'email' => 'lucas@ifce.edu.br',
            'senha' => '55667',
            'matricula' => '2025005',
            'curso' => 'Engenharia'
        ]);

        Aluno::create(attributes: [
            'nome' => 'Larissa Moura',
            'email' => 'larissa@ifce.edu.br',
            'senha' => '77889',
            'matricula' => '2025006',
            'curso' => 'Fisica'
        ]);



        Bibliotecario::create(attributes: [
            'nome' => 'Guilherme Leandro',
            'email' => 'guilherme@ifce.edu.br',
            'senha' => 'admin123'
        ]);
    }
}

