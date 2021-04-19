<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Drug extends Model
{
    protected $casts = [
        'price' => 'float'
    ];
    public function ingredients()
    {
        return $this->belongsToMany('App\Models\Ingredient');
    }
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}
