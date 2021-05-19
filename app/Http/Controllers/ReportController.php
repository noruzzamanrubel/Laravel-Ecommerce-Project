<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Order;

class ReportController extends Controller
{
    public function todayorder()
    {
        $today = date('d-m-y');
        $order = Order::where('status', 1)->where('date', $today)->get();
        return view('admin.report.today_delivery', compact('order'));
    }

    public function todaydeliver()
    {
        $today = date('d-m-y');
        $order = Order::where('status', 3)->where('date', $today)->get();
        return view('admin.report.today_delivery', compact('order'));
    }

    public function thismonth(){

        $month = date('F');
        $order = Order::where('status', 3)->where('month', $month)->get();
        return view('admin.report.this_month', compact('order'));
    }
}
