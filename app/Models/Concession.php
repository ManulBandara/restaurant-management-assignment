<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Concession extends Model
{
    protected $fillable = ['name', 'description', 'image', 'price'];

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_concessions')->withTimestamps();
    }
}