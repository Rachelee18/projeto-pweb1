<?php


namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\Aluno;
use App\Models\Bibliotecario;
use Illuminate\Support\Facades\Hash;


class UsuarioSeeder extends Seeder
{
    public function run()
    {
        Aluno::create([
            'nome' => 'Maria Clara',
            'email' => 'maria@ifce.edu.br',
            'senha' => Hash::make('12345'),
            'matricula' => '2025001',
            'curso' => 'Sistemas'
        ]);


        Aluno::create([
            'nome' => 'Emilly Jullyane',
            'email' => 'emilly@ifce.edu.br',
            'senha' => Hash::make('54321'),
            'matricula' => '2025002',
            'curso' => 'Sistemas'
        ]);


        Aluno::create([
            'nome' => 'Caíque Fernandes',
            'email' => 'caique@ifce.edu.br',
            'senha' => Hash::make('11223'),
            'matricula' => '2025003',
            'curso' => 'Sistemas'
        ]);


        Aluno::create([
            'nome' => 'Ana Beatriz',
            'email' => 'ana@ifce.edu.br',
            'senha' => Hash::make('33445'),
            'matricula' => '2025004',
            'curso' => 'Sistemas'
        ]);


        Aluno::create([
            'nome' => 'Lucas Gabriel',
            'email' => 'lucas@ifce.edu.br',
            'senha' => Hash::make('55667'),
            'matricula' => '2025005',
            'curso' => 'Engenharia'
        ]);


        Aluno::create([
            'nome' => 'Larissa Moura',
            'email' => 'larissa@ifce.edu.br',
            'senha' => Hash::make('77889'),
            'matricula' => '2025006',
            'curso' => 'Fisica'
        ]);


        Bibliotecario::create([
            'nome' => 'Guilherme Leandro',
            'email' => 'guilherme@ifce.edu.br',
            'senha' => Hash::make('admin123')
        ]);
    }
}