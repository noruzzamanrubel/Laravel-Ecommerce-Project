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
                $notification = array(
                    'message' => 'Already Has In Your Wishlist',
                    'alert-type' => 'error',
                );
                return redirect()->back()->with($notification);
            } else {
                DB::table('wishlists')->insert($data);
                $notification = array(
                    'message' => 'Add To Wishlist',
                    'alert-type' => 'success',
                );
                return redirect()->back()->with($notification);
            }

        } else {
            $notification = array(
                'message' => 'Login Your Account First',
                'alert-type' => 'warning',
            );
            return redirect()->back()->with($notification);
        }
    }
}
