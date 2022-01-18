<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\SellerProfile;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \App\Http\Requests\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        if ($request->role == "seller") {

            // dd($request);
            $request->validate([
                'name' => 'required',
                'email' => 'required|unique:users',
                'password' => 'required|min:8|confirmed',
                'password_confirmation' => 'required|min:8',
                'phone' => 'required',
                'zip_code' => 'required',
                'city' => 'required',
                'state' => 'required',
                'street_address' => 'required',
                'house_number' => 'required',
            ]);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
            ]);

            if ($request->subscribe_newsletter == 'on') {
                $subscription = true;
            } else {
                $subscription = false;
            }
            SellerProfile::create([
                'user_id' => $user->id,
                'company_name' => $request->company_name,
                'phone' => $request->phone,
                'picture' => 'default.png',
                'zip_code' => $request->zip_code,
                'city' => $request->city,
                'state' => $request->state,
                'street_address' => $request->street_address,
                'house_number' => $request->house_number,
                'extension' => $request->extension,
                'website' => $request->website,
//                'subscription_type'=>'3'
            ]);

            Auth::login($user);
            event(new Registered($user));
            return redirect(RouteServiceProvider::SELLER);

        } else {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|confirmed|min:8',
            ]);

            Auth::login($user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'user',
            ]));
            
            event(new Registered($user));
            return redirect(RouteServiceProvider::USER);
        }


    }

    public function showSellerRegisterForm()
    {
        return view('auth.seller_register');
    }
}
