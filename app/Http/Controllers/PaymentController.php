<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    public function stripechrage()
    {
        // Set your secret key. Remember to switch to your live secret key in production.
        // See your keys here: https://dashboard.stripe.com/apikeys
        \Stripe\Stripe::setApiKey('sk_test_51IqLTZGLh2TdVfNt0lvc9RtoHlCVDLcG2WPfdwdJt8t7uiuMncsdyfAiVZhUt8IhsJcL4oWYI2JXStBoYsgBhMeI00e2FfoAHw');

// Token is created using Checkout or Elements!
        // Get the payment token ID submitted by the form:
        $token = $_POST['stripeToken'];

        $charge = \Stripe\Charge::create([
            'amount' => 999*100,
            'currency' => 'usd',
            'description' => 'Product Purchase Details',
            'source' => $token,
            'metadata' => ['order_id' => uniqid()],
        ]);
        dd($charge);
    }
}
