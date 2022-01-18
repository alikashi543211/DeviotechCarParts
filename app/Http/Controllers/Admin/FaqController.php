<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faq;

class FaqController extends Controller
{
    public function list()
    {
        $faq = Faq::all();
        return view('admin.faq.list', get_defined_vars());
    }

    public function add()
    {
    	return view('admin.faq.add',get_defined_vars());
    }

    public function save(Request $req, $id = null)
    {
        // $req->validate([
        //     'en_question' => 'required',
        //     'en_answer' => 'required',
        //     'fr_question'=>'required',
        //     'fr_answer' => 'required',
        // ]);
        $faq_data = 
            [
               'en' => [
                   'en_question' => $req->input('en_question'),
                   'en_answer' => $req->input('en_answer')
                ],

               'fr' => [
                   'fr_question' => $req->input('fr_question'),
                   'fr_answer' => $req->input('fr_answer')
               ],
            ];
            // dd($faq_data);

        if (is_null($id)) {
            Faq::create($faq_data);
        } else {
            Faq::where('id', $id)
                ->update($req->except('_token'));
        }

        return redirect()->route('admin.faq.list')->with("success","Saved Successfully");
    }

    public function edit($id)
    {
        $item = Faq::find($id);
        return view('admin.faq.edit', get_defined_vars());
    }

    public function status_change($id)
    {
        $item = Faq::find($id);
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
        Faq::find($id)->delete();
        return back()->with('success','FAQ Deleted Successfully');
    }
}
