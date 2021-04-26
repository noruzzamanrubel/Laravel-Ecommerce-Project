<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Product;

class ProductController extends Controller
{
    public function index()
    {
        return view('admin.product.show');
    }

    public function create()
    {
        return view('admin.product.create');
    }

}
