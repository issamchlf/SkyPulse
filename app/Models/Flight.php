<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Flight extends Model
{
    use HasFactory;
    protected $table = 'flights';
    protected $fillable = [
        'plane_id', 'flight_number', 'departure_airport', 
        'arrival_airport', 'departure_time', 'arrival_time', 
        'price', 'status', 'available_seats'
    ];
    
    public function plane()
    {
        return $this->belongsTo(plane::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'reservations')
                    ->withPivot('seats', 'total_price')
                    ->withTimestamps();
    }
}
