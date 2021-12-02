<?php 

namespace App\Accessors;

trait DefaultAccessors
{
    public function getTitleAttribute($value)
    {
        return strtoupper($value);        
    }
}