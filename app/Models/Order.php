<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'order_id',
        'nama',
        'email',
        'gross_amount',
        'status',
        'payment_type',
    ];
}