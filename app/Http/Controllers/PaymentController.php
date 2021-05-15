<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use Illuminate\Http\Request;
use Session;

class PaymentController extends Controller
{
    public function payment(Request $request)
    {
        $data = array();
        $data['name'] = $request->name;
        $data['phone'] = $request->phone;
        $data['email'] = $request->email;
        $data['city'] = $request->city;
        $data['address'] = $request->address;
        $data['city'] = $request->city;
        $data['payment'] = $request->payment;

        if ($request->payment == 'stripe') {
            return view('pages.stripe', compact('data'));
        } elseif ($request->payment == 'paypal') {

        } else {
            return 'cash on delivery';
        }

    }

    public function stripechrage(Request $request)
    {
        $total = $request->total;
        // $total = $request->total;
        // Set your secret key. Remember to switch to your live secret key in production.
        // See your keys here: https://dashboard.stripe.com/apikeys
        \Stripe\Stripe::setApiKey('sk_test_51IqLTZGLh2TdVfNt0lvc9RtoHlCVDLcG2WPfdwdJt8t7uiuMncsdyfAiVZhUt8IhsJcL4oWYI2JXStBoYsgBhMeI00e2FfoAHw');

// Token is created using Checkout or Elements!
        // Get the payment token ID submitted by the form:
        $token = $_POST['stripeToken'];

        $charge = \Stripe\Charge::create([
            'amount' => $total * 100,
            'currency' => 'usd',
            'description' => 'Product Purchase Details',
            'source' => $token,
            'metadata' => ['order_id' => uniqid()],
        ]);
        // dd($charge);

        $data = array();
        $data['user_id'] = Auth::id();
        $data['payment_id'] = $charge->payment_method;
        $data['paying_amount'] = $charge->amount;
        $data['blnc_transection'] = $charge->balance_transaction;
        $data['stripe_order_id'] = $charge->metadata->order_id;
        $data['shipping'] = $charge->shipping;
        $data['vat'] = $charge->vat;
        $data['total'] = $charge->total;

        if (Session::has('coupon')) {
            $data['subtotal'] = Session::get('coupon')['balance'];
        } else {
            $data['subtotal'] = Cart::subtotal();
        }

        $data['status'] = 0;
        $data['date'] = date('d-m-y');
        $data['month'] = date('F');
        $data['year'] = date('Y');

        $order_id = DB::table('orders')->insertGetId($data);

        //shipping table
        $shipping = array();
        $shipping['order_id'] = $order_id;
        $shipping['ship_name'] = $ship_name;
        $shipping['ship_phone'] = $ship_phone;
        $shipping['ship_email'] = $ship_email;
        $shipping['ship_address'] = $ship_address;
        $shipping['ship_city'] = $ship_city;
        DB::table('shipping')->insert($shipping);

        //order details
        $content= Cart::content();
        $details= array();
        $details['']

    }
}
