<?php

namespace App\Http\Controllers;

use Auth;
use Cart;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function checkout()
    {
        if (Auth::Check()) {
            $cart = Cart::content();
            return view('pages.checkout', compact('cart'));
        } else {
            $notification = array(
                'message' => 'Login Your Account First',
                'alert-type' => 'error',
            );
            return redirect()->route('login')->with($notification);
        }
    }
}
