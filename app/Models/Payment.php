<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
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
