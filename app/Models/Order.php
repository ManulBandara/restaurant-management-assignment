<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['send_to_kitchen_time', 'status', 'total_cost'];

    protected $casts = [
        'send_to_kitchen_time' => 'datetime',
    ];

    public function concessions()
    {
        return $this->belongsToMany(Concession::class, 'order_concessions')->withTimestamps();
    }
}