<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'date',
        'time',
        'guests',
        'pickup',
        'requests',
        'pickup_location',
        'is_read',
    ];

    protected $casts = [
        'pickup' => 'boolean',
        'is_read' => 'boolean',
        'date' => 'date:Y-m-d',
    ];
}
