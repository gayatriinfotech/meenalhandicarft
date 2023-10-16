<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $fillable = ['category_id', 'subcate_id', 'sku_id', 'product_name', 'product_image', 'description', 'mrp', 'retail_price', 'wholesale_price', 'material', 'width', 'height', 'depth', 'weight', 'tags', 'shop_keywords'];
}
