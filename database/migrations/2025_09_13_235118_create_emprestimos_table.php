<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmprestimosTable extends Migration
{
    public function up(): void
    {
        Schema::create('emprestimos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('livro_id')->constrained('livros')->onDelete('cascade');
            $table->foreignId('aluno_id')->constrained('alunos')->onDelete('cascade');
            $table->date('data_emprestimo');
            $table->date('data_devolucao')->nullable();
            $table->string('status')->default('emprestado'); // emprestado / devolvido
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('emprestimos');
    }
}