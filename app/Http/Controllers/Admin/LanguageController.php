<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Language;
use App\Models\Setting;

class LanguageController extends Controller
{
    public function list()
    {
    	$list=Language::all();
    	return view("admin.language.list",get_defined_vars());
    }

    public function add()
    {
    	return view('admin.language.add',get_defined_vars());
    }

    public function save(Request $req, $id = null)
    {
        $req->validate([
            'name' => 'required',
            'short_code' => 'required'
        ]);

        if (is_null($id)) {
            Language::create($req->except('_token'));
        } else {
            Language::where('id', $id)
                ->update($req->except('_token'));
        }

        return redirect()->route('admin.language.list')->with("success","Saved Successfully");
    }

    public function edit($id)
    {
        $item = Language::find($id);
        return view('admin.language.edit', get_defined_vars());
    }

    public function translate($id,Request $req)
    {
    	$language_setting=Setting::where('language_id',$id)
    		->pluck('value', 'name')
    		->toArray();
        if(isset($req->terms))
        {
            return view("admin.settings.terms_translation",get_defined_vars());
        }elseif(isset($req->policy))
        {
            return view("admin.settings.privacy_translation",get_defined_vars());
        }else
        {
            return view("admin.settings.translation",get_defined_vars());
        }
    }

    public function delete($id)
    {
        Language::find($id)->delete();
        return back()->with('success','Deleted Successfully');
    }
}
