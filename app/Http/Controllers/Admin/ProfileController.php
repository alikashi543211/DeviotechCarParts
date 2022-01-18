<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Auth;

class ProfileController extends Controller
{
    public function profile()
    {
    	return view("admin.profile.profile");
    }

    public function resetPassword(Request $request)
    {
    	$user=auth()->user();
    	$password=$user->password;
        $this->validate($request, [
            'old_password' => 'required',
            'new_password' => 'required|min:8',
            'confirm_password' =>'required|same:new_password'
        ]);
        if (Hash::check($request->old_password, $password)) 
        {
        	$user->password = Hash::make($request->new_password);
        	$user->save();
        	return back()->with('success','Password changed successfully');
        }
        else
        {
            return redirect()->back()->with('error','Incorrect Old Password');
        }
    }

    public function updateProfile(Request $request)
    {
        $user =  auth()->user();
        $old_email=$user->email;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        return back()->with('success','Profile updated successfully');
    }
}
