<?php

namespace App\Http\Controllers\Admin;

use App\Exports\CarPartAdvertisementExcelExport;
use App\Http\Controllers\Controller;
use App\Models\CarPartAdvertisement;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class AdvertisementController extends Controller
{
    public function carParts(Request $req)
    {
        if(isset($req->filter))
        {
            $list=CarPartAdvertisement::where('id','!=',0);
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
                $first_record=CarPartAdvertisement::first();
                $to_date = date("Y-m-d", strtotime($req->to_date));
                $from_date=explode(" ",$first_record->created_at)[0];
                $list->whereDate('created_at', '>=', $from_date)->whereDate('created_at', '<=', $to_date);
            }
            $list=$list->get();
        }else
        {
            $list=CarPartAdvertisement::all();
        }
        $carPartAdvertisement=$list;
        return view('admin.car_part_advertisement.list',get_defined_vars());
    }

    public function changeStatus($id)
    {
        $car_part=CarPartAdvertisement::find($id);
        if($car_part->is_active==false)
        {
            $car_part->is_active=true;
        }else
        {
            $car_part->is_active=false;
        }
        $car_part->save();
        return back()->with('success','Car Part Advertisement Status Updated Successfully');
    }

    public function downloadExcelFile() {

        $time = Carbon::now();
        return Excel::download(new CarPartAdvertisementExcelExport(), 'CarPartAdvertisement'.$time.'.xlsx');
    }
}
