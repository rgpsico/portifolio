<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    // Nome da tabela (opcional, só se quiser explicitar)
    protected $table = 'cursos';

    // Campos que podem ser preenchidos em massa (mass assignment)
    protected $fillable = [
        'linguagem',
        'plataforma',
        'body',
    ];
}
