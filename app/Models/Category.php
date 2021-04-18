<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $hidden = ['created_at', 'updated_at', 'priority'];
    protected $table = 'categories';
    public function drugs()
    {
        return $this->hasMany('App\Models\Drug');
    }
}
