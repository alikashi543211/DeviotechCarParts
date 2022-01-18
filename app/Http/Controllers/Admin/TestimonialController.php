<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;

class TestimonialController extends Controller
{
    public function list()
    {
        $list = Testimonial::all();
        return view('admin.testimonial.list', get_defined_vars());
    }

    public function add()
    {
    	return view('admin.testimonial.add',get_defined_vars());
    }

    public function save(Request $req, $id = null)
    {
        $req->validate([
            'name' => 'required',
            'review' => 'required',
            'designation'=>'required',
            'rating'=>'required',
        ]);
        
        if ($req->hasFile('image')) 
        {
            $image = uploadFile($req->image, 'uploads/testimonials');
        }
        if (is_null($id)) {
            $test=new Testimonial();
            $test->name=$req->name;
            $test->image=$image ?? "images/default.png";
            $test->review=$req->review;
            $test->rating=$req->rating;
            $test->designation=$req->designation;
            $test->save();
        }
        else
        {
           $test=Testimonial::find($id); 
           $test->name=$req->name;
            $test->image=$image ?? $test->image;
            $test->review=$req->review;
            $test->rating=$req->rating;
            $test->designation=$req->designation;
            $test->save();
        }


        return redirect()->route('admin.testimonial.list')->with("success","Saved Successfully");
    }

    public function edit($id)
    {
        $item = Testimonial::find($id);
        return view('admin.testimonial.edit', get_defined_vars());
    }

    public function status_change($id)
    {
        $item = Testimonial::find($id);
        if ($item->status == 1) {
            $item->status = 0;
            $item->save();
        } else {
            $item->status = 1;
            $item->save();
        }
        return back()->with('success','Status Changed Successfully');
    }

    public function delete($id)
    {
        Testimonial::find($id)->delete();
        return back()->with('success','Deleted Successfully');
    }
}
