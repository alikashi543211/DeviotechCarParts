<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ScrapYardAdvertisementExcelExport;
use App\Http\Controllers\Controller;
use App\Models\ScrapYardAdvertisement;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ScrapYardAdvertisementController extends Controller
{
    public function list(Request $req)
    {
        if(isset($req->filter))
        {
            $list=ScrapYardAdvertisement::where('id','!=',0);
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
                $first_record=ScrapYardAdvertisement::first();
                $to_date = date("Y-m-d", strtotime($req->to_date));
                $from_date=explode(" ",$first_record->created_at)[0];
                $list->whereDate('created_at', '>=', $from_date)->whereDate('created_at', '<=', $to_date);
            }
            $list=$list->get();
        }else
        {
            $list=ScrapYardAdvertisement::all();
        }
        $scrapYardAdvertisement=$list;
        return view('admin.scrap_yard_advertisement.list',get_defined_vars());
    }

    public function changeStatus($id)
    {
        $car_part=ScrapYardAdvertisement::find($id);
        if($car_part->is_active==false)
        {
            $car_part->is_active=true;
        }else
        {
            $car_part->is_active=false;
        }
        $car_part->save();
        return back()->with('success','Scrap Yard Advertisement Status Updated Successfully');
    }

    public function downloadExcelFile() {

        $time = Carbon::now();
        return Excel::download(new ScrapYardAdvertisementExcelExport(), 'ScrapYardAdvertisement'.$time.'.xlsx');
    }
}
