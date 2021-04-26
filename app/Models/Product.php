<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'subcategory_id',
        'brand_id',
        'product_name',

        'product_code',
        'product_quantity',
        'product_details',
        'product_color',
        'product_size',
        'selling_price',
        'discount_price',
        'main_slider',
        'hot_deal',
        'mid_slider',
        'hot_new',
        'trend',
        'image_one',
        'image_two',
        'image_three',
        'status',
    ];
}
