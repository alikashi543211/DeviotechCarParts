<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SettingController extends Controller
{
    public function index()
    {
        $fix_setting=fixSetting();
        return view('admin.settings.index',get_defined_vars());
    }
    public function store(Request $req)
    {
        if(isset($req->fix_setting))
        {
            $setting = $req->except('_token');
            foreach ($setting as $key => $value) 
            {
                if (empty($value))
                    continue;
                $set = Setting::where('name', $key)->first() ?: new Setting();
                if ($req->hasFile($key)) {
                        $value =  uploadFile($value, 'uploads/cms');
                    }
                $set->name = $key;
                $set->value = $value;
                $set->save();
            }
        }else
        {
            $setting = $req->except('_token');
            foreach ($req->except('_token') as $key => $value)
            {
                $set_count = Setting::where('name',$key)
                    ->where('language_id',$req->language_id)
                    ->count();
                if($set_count==0)
                {
                    $set=new Setting();
                }else
                {
                   $set = Setting::where('name',$key)
                    ->where('language_id',$req->language_id)
                    ->first(); 
                }

                $set->name = $key;
                $set->value = $value ?? ' ';
                $set->language_id=$req->language_id;
                if($key!='language_id')
                {

                   $set->save();
                }

            }
        }
        
        return back()->with('success', 'Setting Updated Successfully');
    }
}
