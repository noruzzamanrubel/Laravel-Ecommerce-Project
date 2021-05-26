<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Product;
use App\Models\Admin\Order;

class Order_detail extends Model
{
    use HasFactory;

    public function products(){
    	return $this->belongsTo(Product::class, 'product_id', 'id');
    }

}
