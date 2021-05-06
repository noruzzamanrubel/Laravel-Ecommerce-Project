<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductDetailsController extends Controller
{
    public function ProductdView($id, $product_name)
    {
        $product = Product::where('id', $id)->first();
        return view('pages.product_details', compact('product'));
    }
}
