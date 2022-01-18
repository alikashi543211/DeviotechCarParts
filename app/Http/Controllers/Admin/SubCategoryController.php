<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;

class SubCategoryController extends Controller
{
   public function index()
    {
        $subcategory = SubCategory::all();
        return view('admin.subcategory.list', get_defined_vars());
    }

    public function add()
    {
    	$category=Category::all();
        return view('admin.subcategory.add', get_defined_vars());
    }

    public function save(Request $req, $id = null)
    {
        $req->validate([
            'name' => 'required',
            'category_id'=>'required',
        ]);
        if (is_null($id)) 
        {
            $category=SubCategory::create([
                'name' => $req->name,
                'category_id'=>$req->category_id,
            ]);
        } 
        else
        {
            SubCategory::find($id)->update([
                'name' => $req->name,
                'category_id'=> $req->category_id,
            ]);
        }
        return redirect()->route('admin.subcategory.list')->with('success', 'SubCategory List Updated Successfully');
    }

     public function edit($id)
    {
        $subcategory = SubCategory::find($id);
        $category=Category::all();
        return view('admin.subcategory.edit', get_defined_vars());
    }

    public function delete($id)
    {
        SubCategory::find($id)->delete();
        return redirect()->route('admin.subcategory.list')->with('success', 'SubCategory Deleted');
    }
}
