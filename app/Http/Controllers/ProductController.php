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
        $brand = DB::table('brands')->get();
        return view('admin.product.create', compact('category', 'brand'));
    }

    public function Getsubcat($category_id){
        $cat= DB::table('subcategories')->where('category_id', $category_id)->get();
        return json_encode($cat);
    }

}
