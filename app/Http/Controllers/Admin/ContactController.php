<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactUs;

class ContactController extends Controller
{
    public function index()
    {
        $list = ContactUs::all();
        return view('admin.contacts.list', get_defined_vars());
    }

    public function delete($id)
    {
        ContactUs::find($id)->delete();
        return back()->with('success', 'Contact Deleted Successfully');
    }
}
