<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ScrapYardAdvertisement;
use App\Models\CarPartAdvertisement;
use Hash;
use App\Rules\UpdatEmailRule;
use App\Models\FavouriteAdvertisement;

use Mail;
class DashboardController extends Controller
{
    public function dashboard(Request $req)
    {
        if(isset($req->verified))
        {
            Mail::send('emails.front.welcome',['data' => $req], function ($send){
                $send->to(auth()->user()->email)->subject('Welcome To CarParts');
            });
            return redirect()->route('user.dashboard')->with('success','Email has been verified successfully');
        }
        $fav_scrap_yard_ids=auth()->user()
            ->favourite_advertisements
            ->where('scrap_yard_advertisement_id','!=',null)
            ->pluck('scrap_yard_advertisement_id')
            ->toArray();
        $fav_car_part_ids=auth()->user()
            ->favourite_advertisements
            ->where('car_part_advertisement_id','!=',null)
            ->pluck('car_part_advertisement_id')
            ->toArray();
        
        $scrapYardAdvertisements=ScrapYardAdvertisement::whereIn('id',$fav_scrap_yard_ids)
            ->get();
        $carPartAdvertisements=CarPartAdvertisement::whereIn('id',$fav_car_part_ids)
            ->get();
        // dd($fav_scrap_yard_ids,$fav_car_part_ids);
        return view("user.dashboard.dashboard",get_defined_vars());
    }

    public function updateProfile(Request $req)
    {
        $req->validate([
            'name' => 'required',
            'email' => ['required',new UpdatEmailRule()],
        ]);

        $user = auth()->user();
        $user->name = $req->name;
        $user->email = $req->email;
        $user->save();
        return back()->with('success','Profile Updated Successfully');
    }

    public function updatePassword(Request $req)
    {
        $user=auth()->user();
        $password=$user->password;
        $this->validate($req, [
            'old_password' => 'required',
            'new_password' => 'required|min:8',
            'confirm_password' =>'required|same:new_password'
        ]);
        if (Hash::check($req->old_password, $password)) 
        {
            $user->password = Hash::make($req->new_password);
            $user->save();
            return back()->with('success','Password changed successfully');
        }
        else
        {
            return redirect()->back()->with('error','Incorrect Old Password');
        }
    }

    public function saveFavourite(Request $req)
    {
        $car_part_advertisement_id=null;
        $scrap_yard_advertisement_id=null;

        if($req->type=='2')
        {
            $car_part_advertisement_id=$req->id;
        }
        elseif($req->type=='1')
        {
            $scrap_yard_advertisement_id=$req->id;
        }

        FavouriteAdvertisement::create(['user_id'=>auth()->user()->id,
            'scrap_yard_advertisement_id'=>$scrap_yard_advertisement_id,
            'car_part_advertisement_id'=>$car_part_advertisement_id]);
        return redirect()->route('user.dashboard')->with('success','Advertisement Added To Your Favourite List Successfully');
    }
}
