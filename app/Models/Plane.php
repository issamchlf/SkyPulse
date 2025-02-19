<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Plane extends Model
{
    use HasFactory;
    protected $table = 'airplanes';
    protected $fillable = ['name', 'type', 'max_seats'];
    
    public function Flights()
    {
        return $this->hasMany(Flight::class);
    }
}
