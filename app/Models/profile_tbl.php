<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profile_tbl extends Model
{
    use HasFactory;
    protected $fillable = ['firstname', 'lastname', 'mobileno', 'email', 'password', 'gender', 'pincode', 'address', 'city', 'state', 'country', 'landmark', 'profile'];
}
