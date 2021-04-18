<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $casts = [
        'created_at' => 'datetime:Y-m-d h:i',
    ];

    protected $fillable = [
        'additional_notes', 'address', 'city', 'post_code'
    ];
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
