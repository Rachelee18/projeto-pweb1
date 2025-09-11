<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bibliotecario extends Model
{
    use HasFactory;

    protected $table = 'bibliotecarios';
    protected $primarykey = 'id';
    protected $fillable = [
        'nome',
        'email',
        'senha'
    ];
    public $timestamps = false;
}

