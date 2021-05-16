<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;

class OrderColtroller extends Controller
{
    public function neworder()
    {
        $order = DB::table('orders')->where('status', 0)->get();
        return view('admin.order.pending', compact('order'));
    }

    public function vieworder($id)
    {
        $order = DB::table('orders')
            ->join('users', 'orders.user_id', 'users.id')
            ->select('orders.*', 'users.name', 'users.phone')
            ->where('orders.id', $id)
            ->first();

        $shipping = DB::table('shipping')->where('order_id', $id)->first();

        $details = DB::table('orders_details')
            ->join('products', 'orders_details.product_id', 'products.id')
            ->select('orders_details.*', 'products.*')
            ->where('orders_details.order_id', $id)
            ->get();

        return view('admin.order.view_order', compact('order', 'shipping', 'details'));
    }

    public function paymentaccept($id)
    {
        DB::table('orders')->where('id', $id)->update(['status' => 1]);
        $notification = array(
            'message' => 'Payment Accept Done',
            'alert-type' => 'success',
        );

        return redirect()->route('new.order')->with($notification);
    }

    public function paymentcancel($id)
    {
        DB::table('orders')->where('id', $id)->update(['status' => 4]);
        $notification = array(
            'message' => 'Order Cancel',
            'alert-type' => 'error',
        );

        return redirect()->route('new.order')->with($notification);
    }
}
