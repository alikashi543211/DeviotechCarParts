<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\SellerProfile;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Mollie\Laravel\Facades\Mollie;
use Config;
use App;

class PackageController extends Controller
{

    public function index()
    {
        $plans=Plan::get();
        return view('seller.Package.package-list',get_defined_vars());
    }


}
