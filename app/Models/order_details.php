<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_details extends Model
{
    use HasFactory;
    protected $fillable = ['order_id', 'user_id', 'product_id', 'quantity', 'price', 'shipping', 'total', 'payment_mode', 'delivery_status', 'date', 'time'];
}
