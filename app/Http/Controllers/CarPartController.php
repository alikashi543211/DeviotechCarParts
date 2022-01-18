<?php

namespace App\Http\Controllers;

use App\Models\CarModel;
use App\Models\CarTrim;
use Illuminate\Http\Request;

class CarPartController extends Controller
{
    public function model($id = null)
    {
        if ($id=='all')
        {
            $carModel=CarModel::all();
            $carModelCount = CarModel::all()->count();
        }
        else
        {
            $carModel = CarModel::where('id_car_make',$id)->get();
            $carModelCount = CarModel::where('id_car_make',$id)->count();
        }

        return [view('ajax.seller.car_model', get_defined_vars())->render(), $carModelCount];
    }

    public function trim($id = null)
    {
        if ($id=='all')
        {
            $carTrim = CarTrim::all();
            $carTrimCount = CarTrim::all()->count();
        }
        else
        {
            $carTrim = CarTrim::where('id_car_model',$id)->get();
            $carTrimCount = CarTrim::where('id_car_model',$id)->count();
        }

        return [view('ajax.seller.car_trim', get_defined_vars())->render(), $carTrimCount];
    }
}
