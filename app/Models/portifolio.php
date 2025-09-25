<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portifolio extends Model
{
    use HasFactory;

    protected $table = 'portifolio';

    protected $fillable = [
        'title',
        'body',
        'url',
        'categoria',
        'cover',
    ];
}
