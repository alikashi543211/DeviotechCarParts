<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Exports\SellerProfileExcel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\SellerProfile;
use Maatwebsite\Excel\Facades\Excel;

class SellerController extends Controller
{
    public function index(Request $req)
    {
        if(isset($req->filter))
        {
            $list=SellerProfile::where('id','!=',0);
            if(isset($req->from_date) && isset($req->to_date))
            {
                $to_date = date("Y-m-d", strtotime($req->to_date));
                $from_date = date("Y-m-d", strtotime($req->from_date));
                $list->whereDate('created_at', '>=', $from_date)->whereDate('created_at', '<=', $to_date);
            }if(isset($req->from_date))
            {
                $to_date = date("Y-m-d");
                $from_date = date("Y-m-d", strtotime($req->from_date));
                $list->whereDate('created_at', '>=', $from_date)->whereDate('created_at', '<=', $to_date);
            }if(isset($req->to_date))
            {
                $first_seller=SellerProfile::first();
                $to_date = date("Y-m-d", strtotime($req->to_date));
                $from_date=explode(" ",$first_seller->created_at)[0];
                $list->whereDate('created_at', '>=', $from_date)->whereDate('created_at', '<=', $to_date);
            }
            $list=$list->get();
        }else
        {
            $list=SellerProfile::all();
        }
        $seller_list=$list;
    	return view("admin.seller.list",get_defined_vars());
    }

    public function changeStatus($id)
    {
        $seller=SellerProfile::find($id);
        if($seller->is_certified==false)
        {
            $seller->is_certified=true;
        }else
        {
            $seller->is_certified=false;
        }
        $seller->save();
        return back()->with('success','Car Part Advertisement Status Updated Successfully');
    }

    public function downloadExcelFile() {
        $time = Carbon::now();

        return Excel::download(new SellerProfileExcel(), 'Seller Data '.$time.'.xlsx');
    }
}
