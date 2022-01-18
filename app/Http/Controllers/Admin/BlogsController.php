<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Blog;

class BlogsController extends Controller
{
    public function add()
    {
        return view('admin.blog.add',get_defined_vars());
    }
    public function store(Request $req, $id = null)
    {
        if (is_null($id))
        {
            $req->validate(['title' => 'required|unique:blogs,title|max:190',
             'image' => 'required|mimes:jpeg,bmp,png,gif,svg',
              'description' => 'required',
             'description' => 'required',
            ]);
        }
        else
        {
            $req->validate(['title' => 'required|min:3|max:190',
            'description' => 'required',

            ]);
        }

        if (is_null($id))
        {
            $data = $req->except('_token');
            $image_path = uploadFile($req->image, 'uploads/blogs/images', $count = null);
            $data['image'] = $image_path;
            $slug = Str::slug($data['title'], '-');
            $data['slug'] = $slug;
            Blog::create($data);
            $msg = 'Blog Created Successfully';
        }
        else
        {

            $data = $req->except('_token');
            if ($req->image)
            {
                $image_path = uploadFile($req->image, 'uploads/blogs/images', $count = null);
                $data['image'] = $image_path;
            }
            Blog::where('id', $id)->update($data);
            $msg = 'Blog Updated Successfully';
        }

        return redirect()->route('admin.blogs.list')
            ->with('success', $msg);
    }
    public function list()
    {
        $blogs = Blog::all();
        return view('admin.blog.list', get_defined_vars());
    }
    public function edit($id)
    {
        $blog = Blog::find($id);
        return view('admin.blog.edit', get_defined_vars());
    }
    public function delete($id)
    {
        Blog::find($id)->delete();
        return back()
            ->with('success', 'Blog deleted successfully');
    }
    public function blog_visibility($id, $visibility)
    {
        $change_visibility = Blog::find($id);
        $change_visibility->visibility = $visibility;
        $change_visibility->save();
        if ($visibility == "hidden")
        {
            return back()->with('success', 'Blog Hide Successfully');
        }
        if ($visibility == "showed")
        {
            return back()->with('success', 'Blog Showed Successfully');
        }

    }
}
