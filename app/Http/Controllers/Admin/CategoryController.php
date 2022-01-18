<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();
        return view('admin.category.list', get_defined_vars());
    }

    public function add()
    {
        return view('admin.category.add', get_defined_vars());
    }

    public function save(Request $req, $id = null)
    {
        $req->validate([
            'name' => 'required',
        ]);
        if (is_null($id)) 
        {
            $category=Category::create([
                'name' => $req->name,
            ]);
        } 
        else{
            Category::find($id)->update([
                'name' => $req->name,
            ]);
        }
        return redirect()->route('admin.category.list')->with('success', 'Category List Updated Successfully');
    }

     public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit', get_defined_vars());
    }

    public function delete($id)
    {
        Category::find($id)->delete();
        return redirect()->route('admin.category.list')->with('success', 'Category Deleted');
    }
}
