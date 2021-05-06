<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Cart;

class AddToCartController extends Controller
{
    public function addcart($id)
    {
        $product = Product::where('id', $id)->first();
        $data = array();
        if ($product->discount_price == null) {
            $data['id'] = $product->id;
            $data['name'] = $product->product_name;
            $data['qty'] = 1;
            $data['price'] = $product->selling_price;
            $data['weight'] = 1;
            $data['options']['image'] = $product->image_one;
            $data['options']['color'] = $product->product_color;
            $data['options']['size'] = $product->product_size;
            Cart::add($data);
            return \Response::json(['success' => 'Successfully Add On Your Cart']);
        } else {
            $data['id'] = $product->id;
            $data['name'] = $product->product_name;
            $data['qty'] = 1;
            $data['price'] = $product->discount_price;
            $data['weight'] = 1;
            $data['options']['image'] = $product->image_one;
            $data['options']['color'] = $product->product_color;
            $data['options']['size'] = $product->product_size;
            Cart::add($data);
            return \Response::json(['success' => 'Successfully Add On Your Cart']);
        }
    }

    public function check()
    {
        $check = Cart::content();
        return response()->json($check);
    }
}
