<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emprestimo extends Model
{
    use HasFactory;

    protected $table = 'emprestimos';
    protected $fillable = [
        'livro_id',
        'aluno_id',
        'data_emprestimo',
        'data_devolucao',
        'status'
    ];

    public $timestamps = true;

    public function livro()
    {
        return $this->belongsTo(Livro::class);
    }

    public function aluno()
    {
        return $this->belongsTo(Aluno::class);
    }
}