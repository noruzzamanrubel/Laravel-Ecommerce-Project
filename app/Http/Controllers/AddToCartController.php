<?php

namespace App\Http\Controllers;

use App\Models\Product;

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
            $data['options'][image] = $product->image_one;
            Cart::add($data);
            return \Response::json(['error' => 'Successfully Add On Your Cart']);
        } else {
            $data['id'] = $product->id;
            $data['name'] = $product->product_name;
            $data['qty'] = 1;
            $data['price'] = $product->discount_price;
            $data['weight'] = 1;
            $data['options'][image] = $product->image_one;
            Cart::add($data);
            return \Response::json(['error' => 'Successfully Add On Your Cart']);
        }
    }
}
