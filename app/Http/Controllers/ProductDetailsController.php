<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductDetailsController extends Controller
{
    public function ProductdView($id, $product_name)
    {
        $product = Product::where('id', $id)->first();

        $color = $product->product_color;
        $product_color = explode(',', $color);

        $size = $product->product_size;
        $product_size = explode(',', $size);
        
        return view('pages.product_details', compact('product', 'product_color', 'product_size'));
    }
}
