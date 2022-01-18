<?php

namespace App\Http\Controllers\Admin;

use App\Exports\OrderPaymentExcelExport;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Laravel\Cashier\Order\Order;
use Maatwebsite\Excel\Facades\Excel;

class OrderController extends Controller
{
    public function list(Request $req) {

    	if(isset($req->filter))
        {
            $list=Order::where('id','!=',0);
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
                $first_record=Order::first();
                $to_date = date("Y-m-d", strtotime($req->to_date));
                $from_date=explode(" ",$first_record->created_at)[0];
                $list->whereDate('created_at', '>=', $from_date)->whereDate('created_at', '<=', $to_date);
            }
            $list=$list->with('owner')->get();
        }else
        {
            $list=Order::with('owner')->get();
        }
        $orders = $list;

        return view('admin.order.list',get_defined_vars());
    }

    public function downloadExcelFile() {
        $time = Carbon::now();

        return Excel::download(new OrderPaymentExcelExport, 'Order Payment Data '.$time.'.xlsx');
    }
}
