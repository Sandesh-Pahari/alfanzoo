<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
     protected $fillable = [
        'title',
        'slug',
        'type',
        'views',
        'date',
        'file_path',
    ];
}
