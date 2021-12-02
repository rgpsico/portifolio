<?php

namespace App\Models;

use App\Accessors\DefaultAccessors;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class article extends Model
{
    use HasFactory, DefaultAccessors; 
    protected $fillable = ['title', 'body', 'categoria', 'type', 'cover'];
    public $timestamps = false;
        
}
