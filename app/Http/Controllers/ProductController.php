<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Admin\Brand;
use App\Models\Admin\Category;
use App\Models\Admin\Subcategory;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::all();
        return view('admin.product.all', compact('product'));
    }

    public function create()
    {
        $category = Category::all();
        $subcat = Subcategory::all();
        $brand = Brand::all();
        return view('admin.product.create', compact('category', 'subcat', 'brand'));
    }
    public function store(Request $request)
    {

        $image = $request->file('image_one');
        $image_name = hexdec(uniqid());
        $ext = strtolower($image->getClientOriginalExtension());
        $image_full_name = $image_name . '.' . $ext;
        $upload_path = 'upload/product_images/';
        $image_url = $upload_path . $image_full_name;
        $image->move($upload_path, $image_full_name);

        // $data = new Product();
        // $data->product_name = $request->product_name;
        // $data->product_code = $request->product_code;
        // $data->product_quantity = $request->product_quantity;
        // $data->category_id = $request->category_id;
        // $data->subcategory_id = $request->subcategory_id;
        // $data->brand_id = $request->brand_id;
        // $data->product_size = $request->product_size;
        // $data->product_color = $request->product_color;
        // $data->selling_price = $request->selling_price;
        // $data->product_details = $request->product_details;
        // $data->video_link = $request->video_link;
        // $data->main_slider = $request->main_slider;
        // $data->hot_deal = $request->hot_deal;
        // $data->best_rated = $request->best_rated;
        // $data->trend = $request->trend;
        // $data->mid_slider = $request->mid_slider;
        // $data->hot_new = $request->hot_new;
        // $data->status = 1;
        // $data->save();
        
        Product::insert([
            'product_name' => $request->product_name,
            'product_code' => $request->product_code,
            'product_quantity' => $request->product_quantity,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'brand_id' => $request->brand_id,
            'product_size' => $request->product_size,
            'product_color' => $request->product_color,
            'selling_price' => $request->selling_price,
            'product_details' => $request->product_details,
            'video_link' => $request->video_link,
            'main_slider' => $request->main_slider,
            'product_details' => $request->product_details,
            'hot_deal' => $request->hot_deal,
            'best_rated' => $request->best_rated,
            'trend' => $request->trend,
            'mid_slider' => $request->mid_slider,
            'hot_new' => $request->hot_new,
            'status' => 1,
            'image_one' => $image_url,
        ]);
        return redirect()->back();
    }

    public function edit($id)
    {
        $category = Category::all();
        $subcat = Subcategory::all();
        $brand = Brand::all();
        return view('admin.product.edit', compact('category', 'subcat', 'brand'));
    }

    public function destroy($id)
    {
        $data = Product::findorfail($id);
        $data->delete();
        $notification = array(
            'message' => 'Product Successfully Delete',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

}
