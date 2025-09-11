<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bibliotecario extends Model
{
    use Hasfactory;

    protected $table = 'alunos';
    protected $primarykey = 'id';
    protected $fillable = [
        'nome',
        'email',
        'senha'
    ];
    public $timestamps = false;
}

