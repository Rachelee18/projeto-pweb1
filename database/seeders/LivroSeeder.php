<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Livro;

class LivroSeeder extends Seeder
{
    public function run(): void
    {
        Livro::create([
            'titulo' => 'O Ladrão de Raios',
            'autor' => 'Rick Riordan',
            'ano_publicacao' => 2005,
            'isbn' => '111123456789',
            'editora'=> 'Intrínseca'
        ]);

        Livro::create([
            'titulo' => 'Lugar Nenhum',
            'autor' => 'Neil Gaiman',
            'ano_publicacao' => 1996,
            'isbn' => '1222223456789',
            'editora'=> 'Intrínseca'
        ]);

        Livro::create([
            'titulo' => 'Neuromancer',
            'autor' => 'William Gibson',
            'ano_publicacao' => 1984,
            'isbn' => '1233333456789',
            'editora'=> 'Aleph'
        ]);
    }
}