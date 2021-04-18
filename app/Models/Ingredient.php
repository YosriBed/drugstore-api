<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }
}
