<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Hash;
use Str;

class ProfileController extends Controller
{
   public function resetPassword(Request $request)
    {
        $user = Auth::user();
        $id = Auth::id();
        $password = User::where('id', $id)->value('password');
        $this->validate($request, [
            'oldpassword' => 'required',
            'newpassword'  => 'required|min:8',
            'confirm_password' =>'required|same:newpassword'
        ]);
        if (Hash::check($request->oldpassword, $password))
        {
	        $user->password = Hash::make($request->newpassword);
	        $user->save();
	        // logout after changing password
	        Auth::logout();
	        return redirect('/login')->with('success','password changed successfully');
        }
        else
        {
            return redirect()->back()->with('error','Incorrect Old Password');
        }
	}
    public function updateProfile(Request $request)
    {
    	// dd($request);
       	$request->validate([
            'email' => 'required|email',
            'name' => 'required|string|max:191',
            'phone' => 'required|numeric',
            'address' => 'required',
        ]);
        $user = Auth::user();
        $id = Auth::id();
        $user =  User::find($id);
        $old_email=$user->email;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->sellerProfile->phone = $request->phone;
        $user->sellerProfile->address = $request->address;

        if($request->has('picture')) {
            $user->sellerProfile->picture = uploadFile($request->picture, 'member_profile-pictures/'.Str::slug($user->name));
        }
        $user->push();

        return back()->with("success","Profile updated successfully");
        // Auth::logout();
        // return redirect('/login')->with('success','Credentials changed successfully,please use new credentials to SignIn');

    }
}
