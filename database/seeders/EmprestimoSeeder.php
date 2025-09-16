<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Emprestimo;

class EmprestimoSeeder extends Seeder
{
    public function run()
    {
        Emprestimo::create([
            'livro_id' => 1,
            'aluno_id' => 1,
            'data_emprestimo' => '2025-09-01',
            'data_devolucao' => '2025-09-10',
            'status' => 'devolvido'
        ]);

        Emprestimo::create([
            'livro_id' => 2,
            'aluno_id' => 2,
            'data_emprestimo' => '2025-09-05',
            'data_devolucao' => null,
            'status' => 'pendente'
        ]);

        Emprestimo::create([
            'livro_id' => 3,
            'aluno_id' => 3,
            'data_emprestimo' => '2025-08-28',
            'data_devolucao' => '2025-09-03',
            'status' => 'devolvido'
        ]);

        Emprestimo::create([
            'livro_id' => 4,
            'aluno_id' => 5,
            'data_emprestimo' => '2025-09-10',
            'data_devolucao' => null,
            'status' => 'pendente'
        ]);
    }
}
