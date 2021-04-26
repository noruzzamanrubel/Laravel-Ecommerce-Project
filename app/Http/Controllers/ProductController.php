<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Product;
use DB;

class ProductController extends Controller
{
    public function index()
    {
        return view('admin.product.show');
    }

    public function create()
    {
        $category = DB::table('categories')->get();
        $subcat = DB::table('subcategories')->get();
        $brand = DB::table('brands')->get();
        return view('admin.product.create', compact('category', 'subcat', 'brand'));
    }

}
