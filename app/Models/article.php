<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class article extends Model
{
    protected $fillable = ['title', 'body', 'categoria', 'type', 'cover'];
    public $timestamps = false;

  
    
  
}
