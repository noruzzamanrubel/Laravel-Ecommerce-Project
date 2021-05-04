<?php

namespace App\Http\Controllers;

use Auth;
use DB;

class WishlistController extends Controller
{
    public function addwishlist($id)
    {
        $userid = Auth::id();
        $data = array(
            'user_id' => $userid,
            'product_id' => $id,
        );

        $check = DB::table('wishlists')->where('user_id', $userid)->where('product_id', $id)->first();

        if (Auth::Check()) {

            if ($check) {
                return \Response::json(['error' => 'Product Allready has on your Wishlist']);
            } else {
                DB::table('wishlists')->insert($data);
                return \Response::json(['success' => 'Product Added On Wishlist']);
            }

        } else {
            return \Response::json(['error' => 'At first login your account']);
        }
    }
}
