<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\CarPartAdvertisement;
use App\Models\ScrapYardAdvertisement;
use App\Models\Plan;
use App\Models\MollieSubscription;
use App\Models\SellerProfile;
use Laravel\Cashier\Order\Order;


class DashboardController extends Controller
{
    public function dashboard()
    {
        // dd(Config::get('app.locale'));
        // Last Seven Days Charts Code
        $report = 'day';
        $limit = 7;
        $days=getNDaysDates(7, 'Y-m-d');
        $start_day=$days[0];
        $end_day=$days[1];

        $car_parts = CarPartAdvertisement::selectRaw("*,WEEKDAY(created_at) as day")
            ->whereBetween('created_at', [$start_day,$end_day])
            ->get();
        $car_arr= array();
        for($i = 0;$i < $limit;$i++)
        {
            $car_arr[]=count($car_parts->where('day' , $i));
        }
        $min_car_part=min($car_arr);
        $max_car_part=max($car_arr);

        $scrap_yards = ScrapYardAdvertisement::selectRaw("*,WEEKDAY(created_at) as day")
            ->whereBetween('created_at', [$start_day,$end_day])
            ->get();
        $scrap_arr= array();
        for($i = 0;$i < $limit;$i++)
        {
            $scrap_arr[]=count($scrap_yards->where('day' , $i));
        }
        $min_scrap_yard=min($scrap_arr);
        $max_scrap_yard=max($scrap_arr);

        $subscriptions = Order::selectRaw("*,WEEKDAY(created_at) as day")
            ->where('mollie_payment_status', 'paid')
            ->get();
        $subs_arr= array();
        for($i = 0;$i < $limit;$i++)
        {
            $subs_arr[]=$subscriptions->where('day' , $i)->sum('total');
        }
        $subs_arr=array_filter($subs_arr);
        $min_subscription=min($subs_arr);
        $max_subscription=max($subs_arr);

    	$user_count=User::count();
    	$seller_count=SellerProfile::count();
    	$car_part_count=CarPartAdvertisement::count();
    	$scrap_yard_count=ScrapYardAdvertisement::count();
    	$plan_count=Plan::count();
    	$subscription_count=MollieSubscription::count();

    	$count_total_payment = Order::where('mollie_payment_status', 'paid')->sum('total');
        return view('admin.dashboard.dashboard', get_defined_vars());
    }
    

}
