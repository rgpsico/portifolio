<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categoria extends Model
{
    protected $fillable = ['title','body'];
    public $timestamps = false;

    protected $table = 'categoria';
}
