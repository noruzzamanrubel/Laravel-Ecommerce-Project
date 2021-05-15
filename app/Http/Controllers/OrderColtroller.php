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
}
