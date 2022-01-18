<?php

namespace App\Http\Controllers\Seller;

use App\Models\ScrapYardAdvertisement;
use App\Http\Controllers\Controller;
use App\Models\ScrapYardImage;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;
use App\Models\CarModel;
use App\Models\CarTrim;
use App\Models\CarMake;
use App\Rules\ImagesRule;
use Str;

class ScrapYardAdvertisementController extends Controller
{
    public function list()
    {
    	$scrapYardAdvertisement = ScrapYardAdvertisement::where('user_id', auth()->user()->id)->get();
    	return view('seller.scrap_yard_advertisement.list', get_defined_vars());
    }

    public function add()
    {
    	$carMake = CarMake::all();
        $category = Category::all();
    	return view('seller.scrap_yard_advertisement.add', get_defined_vars());
    }

    public function edit($id = null)
    {
        $scrapYardAdvertisement = ScrapYardAdvertisement::find($id);
        $carMake = CarMake::all();
        $carModel = CarModel::where('id_car_make',$scrapYardAdvertisement->car_make_id)->get();
        $carTrim = CarTrim::where('id_car_model',$scrapYardAdvertisement->car_model_id)->get();
        return view('seller.scrap_yard_advertisement.edit', get_defined_vars());
    }

    public function model($id = null)
    {
        $carModel = CarModel::where('id_car_make',$id)->get();
        $carModelCount = CarModel::where('id_car_make',$id)->count();

        return [view('ajax.seller.car_model', get_defined_vars())->render(), $carModelCount];
    }

    public function trim($id = null)
    {
        $carTrim = CarTrim::where('id_car_model',$id)->get();
        $carTrimCount = CarTrim::where('id_car_model',$id)->count();
        return [view('ajax.seller.car_trim', get_defined_vars())->render(), $carTrimCount];
    }

    public function save(Request $req, $id = null)
    {
        $messages = [
            'title.required' => 'Title field is required',
            'car_make.required' => 'Car make field is required',
            'car_model.required' => 'Car model field is required',
            'description.confirmed' => 'Description field is required',

        ];
        $rules = [
            'title' => 'required',
            'car_make' => 'required',
            'car_model'=>'required',
            'description' =>'required'
            'images' => [new ImagesRule()],
        ];

        $this->validate($req,$rules,$messages);
        if (is_null($id))
        {
            $scrapYardAdvertisement = ScrapYardAdvertisement::create([
                'title'=>$req->title,
                'slug'=>Str::slug($req->title),
                'user_id' => auth()->user()->id,
                'car_make_id' => $req->car_make,
                'car_model_id'=>$req->car_model,
                'car_trim_id'=>$req->car_trim,
                'description'=>$req->description,
                'price'=>$req->price,
            ]);
            if($req->has('images')) {
                for($i=0; $i < sizeof($req->images); $i++)
                {
                    ScrapYardImage::create([
                        'scrap_yard_advertisement_id' => $scrapYardAdvertisement->id,
                        'image' => uploadFile($req->images[$i], 'scrap_yard-images/'.Str::slug($scrapYardAdvertisement->id))
                    ]);
                }
            }
        }
        else
        {
            $scrapYardAdvertisement = ScrapYardAdvertisement::find($id)->update([
                'title'=>$req->title,
                'slug'=>Str::slug($req->title),
                'user_id' => auth()->user()->id,
                'car_make_id' => $req->car_make,
                'car_model_id'=>$req->car_model,
                'car_trim_id'=>$req->car_trim,
                'description'=>$req->description,
                'price'=>$req->price,
            ]);

            if($req->has('images'))
            {
                for($i=0; $i < sizeof($req->images); $i++)
                {
                    ScrapYardImage::create([
                        'scrap_yard_advertisement_id' => $id,
                        'image' => uploadFile($req->images[$i], 'scrap_yard-images/'.Str::slug($id))
                    ]);
                }
            }
        }
        return redirect()->route('seller.scrap.yard.advertisement.list')->with('success', 'Scrap Yard Advertisement List Updated Successfully');
    }

    public function delete($id = null)
    {
        ScrapYardAdvertisement::find($id)->delete();
        return redirect()->route('seller.scrap.yard.advertisement.list')->with('success', 'Scrap Yard Advertisement Deleted');
    }

    public function deleteImage($id = null)
    {
        $image = ScrapYardImage::find($id)->delete();
        return response()->json(['success' => 'Image Deleted Successfully']);
    }

    public function changeStatus(Request $req)
    {
        ScrapYardAdvertisement::where('id',$req->id)
            ->update(['status'=>$req->status]);
        return back()->with("success","Status Updated Successfully");
    }
}
