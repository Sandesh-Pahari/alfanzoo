<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'email',
        'no_of_people',
        'room_id',
        'check_in',
        'check_out',
        'special_request',
        'pickup',
        'is_read',
        'pickup_details',
    ];

    // Relationship: Booking belongs to a Room
    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
