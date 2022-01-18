<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Plan;

class PlanController extends Controller
{
    public function list()
    {
    	$plan=Plan::where('subscription_type',seller()->subscription_type)->first();
    	return view("seller.plan.list",get_defined_vars());
    }
}
