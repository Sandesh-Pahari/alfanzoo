<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Room extends Model
{
  use HasFactory;

  protected $fillable = [
    'name',
    'type',
    'description',
    'capacity',
    'beds',
    'price',
    'image',
    'facilities',
  ];
  protected $casts = [
    'facilities' => 'array', // auto cast JSON to array
  ];

  // Relation with Booking
  public function bookings()
  {
    return $this->hasMany(Booking::class);
}
}