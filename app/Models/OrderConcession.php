<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class OrderConcession extends Pivot
{
    protected $table = 'order_concessions';
}