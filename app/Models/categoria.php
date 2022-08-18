<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class categoria extends Model
{
    protected $fillable = ['title', 'body'];
    public $timestamps = false;

    protected $table = 'categoria';

    public function article()
    {
        return $this->hasMany(article::class, 'id', 'categoria');
    }
}
