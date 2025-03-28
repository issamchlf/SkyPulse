<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payments';
    protected $fillable = ['user_id', 'reservation_id', 'amount', 'payment_method', 'status'];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Reservation()
    {
        return $this->belongsTo(Reservation::class);
    }
}
