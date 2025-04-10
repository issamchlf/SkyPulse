<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Plane extends Model
{
    use HasFactory;
    protected $table = 'planes';
    protected $fillable = ['name', 'type', 'max_seats','picture'];
    
    public function Flights()
    {
        return $this->hasMany(Flight::class);
    }
}
