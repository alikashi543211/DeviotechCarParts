<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('seller.dashboard.dashboard', get_defined_vars());
    }

}
