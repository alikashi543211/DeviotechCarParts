<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\SellerProfile;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Laravel\Cashier\SubscriptionBuilder\RedirectToCheckoutResponse;
use Illuminate\Support\Facades\Auth;
use Config;
use App\Models\CarPartAdvertisement;
use App\Models\ScrapYardAdvertisement;
use Carbon\Carbon;
use Session;

class MollieController extends Controller
{
    public function __invoke($id)
    {
        $plan_fetch=Plan::where('id',$id)->first('subscription_type');

        if ($plan_fetch->subscription_type=='1')
        {
            $plan='car_parts';
        }
        elseif ($plan_fetch->subscription_type=='2')
        {
            $plan='scrapeyard_parts';
        }
        else
        {
            $plan='ultimate';
        }
        $name="membership";
        $user=auth()->user();
        if(!$user->subscribed($name, $plan)) {

            $result = $user->newSubscription($name, $plan)->create();

            SellerProfile::where('user_id',Auth::id())->update(['subscription_type'=>$plan_fetch->subscription_type]);
            if(is_a($result, RedirectToCheckoutResponse::class)) {
                return $result; // Redirect to Mollie checkout
            }

            return redirect(RouteServiceProvider::SELLER)->with('success','Plan Purchase Successfully');
        }

        return back()->with('status', 'You are already on the ' . $plan . ' plan');

    }

    public function changePlan($id)
    {
        // plan_config();
        // dd(Config::get('cashier_plans.plans'));
        if(seller()->subscription_type=='1')
        {
            $current_plan='car_parts';
        }elseif (seller()->subscription_type=='2')
        {
            $current_plan='scrapeyard_parts';
        }else
        {
            $current_plan='ultimate';
        }
        
        $current_plan_name=ucfirst($current_plan) . ' membership';
        $plan_fetch=Plan::where('id',$id)->first('subscription_type');
        if ($plan_fetch->subscription_type=='1')
        {
            $plan='car_parts';
        }
        elseif ($plan_fetch->subscription_type=='2')
        {
            $plan='scrapeyard_parts';
        }
        else
        {
            $plan='ultimate';
        }
        $new_plan_name=ucfirst($plan) . ' membership';
        $user=auth()->user();
        // Swap right now
        $user->subscription("membership")->swap($plan);
        // Swap once the current cycle has completed
        $user->subscription("membership")->swapNextCycle($plan);
        SellerProfile::where('id',seller()->id)->update(['subscription_type'=>$plan_fetch->subscription_type]);
        return redirect()->route("seller.plan.list")->with('success','Plan Updated Successfully');
    }

    public function cancelPlan()
    {
        $user=auth()->user();
        $user->subscription('membership')->cancel();
        CarPartAdvertisement::where('user_id',$user->id)
            ->update(['is_active'=>0]);
        ScrapYardAdvertisement::where('user_id',$user->id)
            ->update(['is_active'=>0]);
        SellerProfile::where('user_id',$user->id)
            ->update(['subscription_type'=>null]);
        return redirect()->route("seller.select_package")->with('success','Subscription cancelled successfully');
    }
}
