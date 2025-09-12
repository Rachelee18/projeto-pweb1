<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Livro extends Model
{
    use HasFactory;
    protected $table = 'livros';
    
    protected $fillable = [
        'titulo',
        'autor',
        'ano_publicacao',
    ];

    // para desabilitar os timestamps
    public $timestamps = false;
}