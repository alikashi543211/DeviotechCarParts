<?php

namespace App\Http\Controllers\seller;

use App\Http\Controllers\Controller;
use App\Models\SellerProfile;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;

class ProfileController extends Controller
{
     public function profile()
    {
    	return view("seller.profile.profile",get_defined_vars());
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

    public function profileUpdate(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'company_name' => 'required',
            'street_address' => 'required',
            'house_number' => 'required',
            'extension' => 'required',
            'phone' => 'required',
            'zip_code' => 'required',
            'city' => 'required',
            'state' => 'required',
        ]);

        $user = auth()->user();
        $user->name = $request->name;
        $user->save();

        $seller_profile = SellerProfile::where('user_id', $user->id)->first();
        $seller_profile->company_name = $request->company_name;
        $seller_profile->phone = $request->phone;
        $seller_profile->street_address = $request->street_address;
        $seller_profile->house_number = $request->house_number;
        $seller_profile->extension = $request->extension;
        $seller_profile->city = $request->city;
        $seller_profile->state = $request->state;
        $seller_profile->zip_code = $request->zip_code;
        $seller_profile->introduction = $request->introduction;
        if ($request->has('picture'))
        {
            $seller_profile->picture = uploadFile($request->picture,'uploads/users');
        }
        $seller_profile->save();

        return back()->with('success', 'Profile has been updated');
    }


}
