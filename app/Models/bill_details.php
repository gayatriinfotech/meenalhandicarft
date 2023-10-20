<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bill_details extends Model
{
    use HasFactory;
    protected $fillable = ['order_id', 'name', 'number', 'email', 'address', 'pincode', 'city', 'state', 'country', 'landmark', 'product_status', 'delivery_status'];
}
