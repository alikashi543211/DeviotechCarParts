<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactUs;
use Mail;

class ContactUsController extends Controller
{
    public function contact_us(Request $request){
    	
        ContactUs::create($request->except('_token'));
        Mail::send('emails.front.contact',['data' => $request], function ($send) use($request){
            $send->to("carparts@support.com")->cc("carparts@cc.com")->subject('Contact Message');
        });
        return redirect()->back()->with('success','Feedback recorded. We Will get to you soon');
    }
}
