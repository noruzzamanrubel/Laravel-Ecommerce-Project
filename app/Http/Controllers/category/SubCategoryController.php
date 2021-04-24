<?php

namespace App\Http\Controllers\category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Subcategory;
use App\Models\Admin\Category;
use DB;

class SubCategoryController extends Controller
{
    public function index()
    {
        $category= DB::table('categories')->get();
        $subcat= DB::table('subcategories')
            ->join('categories', 'subcategories.category_id', 'categories.id')
            ->select('subcategories.*','categories.category_name')
            ->get();

        return view('admin.subcategory.subcategory', compact('category','subcat'));
    }

    public function store(Request $request){
        $validated = $request->validate([
            'category_id' => 'required',
            'subcategory_name' => 'required',
        ]);

        Subcategory::insert([
            'category_id' => $request->category_id,
            'subcategory_name' => $request->subcategory_name,
        ]);

        $notification = array(
            'message' => 'Sub Category Inserted Successfully',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    public function edit($id)
    {
        // $subcat = Subcategory::find($id);
        // $edit_cat = Category::find($id);
        // return view('admin.subcategory.edit',compact('subcat','edit_cat'));
        $subcat = DB::table('subcategories')->where('id',$id)->first();
        $edit_cat = DB::table('categories')->get();
        return view('admin.subcategory.edit',compact('subcat','edit_cat'));
    }

    public function destroy($id)
    {
        $subcat_delete = Subcategory::find($id);
        $subcat_delete->delete();

        $notification = array(
            'messege' => 'Sub Category Deleted Successfully',
            'alert-type' => 'success',
        );

        return Redirect()->back()->with($notification);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'subcategory_name' => 'required',
        ]);

        Subcategory::find($id)->update([
            'category_id' => $request->category_id,
            'subcategory_name' => $request->subcategory_name,
        ]);

        $notification = array(
            'message' => 'Sub Category Updated Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('subcategory')->with($notification);
    }
}
