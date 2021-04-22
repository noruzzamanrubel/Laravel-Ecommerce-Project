<?php

namespace App\Http\Controllers\category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Brand;

class BrandController extends Controller
{
    public function index()
    {
        $brand = Brand::all();
        return view('admin.brand.brand', compact('brand'));
    }

    public function StoreBrand(Request $request)
    {
        $validated = $request->validate([
            'brand_name' => 'required|unique:categories|max:255',
        ]);

        $brand = new Brand();
        $brand->brand_name = $request->brand_name;

        // if ($request->file('brand_logo')) {
        //     $file = $request->file('brand_logo');
        //     @unlink(public_path('upload/brand_images/' . $data->brand_logo));
        //     $filename = date('YmdHi') . $file->getClientOriginalName();
        //     $file->move(public_path('upload/brand_images'), $filename);
        //     $data['brand_logo'] = $filename;
        // }

        $brand->save();

        $notification = array(
            'message' => 'Brand Info Update Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('brand')->with($notification);

    }
}
