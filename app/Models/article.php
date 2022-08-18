<?php

namespace App\Models;

use App\Accessors\DefaultAccessors;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class article extends Model
{
    use HasFactory;
    use DefaultAccessors;
    protected $fillable = ['title', 'body', 'categoria', 'type', 'cover'];
    public $timestamps = false;

    public function categoria()
    {
        return $this->belongsTo(categoria::class, 'categoria', 'id');
    }
}
