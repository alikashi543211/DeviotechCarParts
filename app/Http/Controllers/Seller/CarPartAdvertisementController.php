<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\CarPartAdvertisement;
use Illuminate\Http\Request;
use App\Models\CarPartImage;
use App\Models\SubCategory;
use App\Models\Category;
use App\Models\CarModel;
use App\Models\CarTrim;
use App\Models\CarMake;
use App\Rules\ImagesRule;
use Str;

class CarPartAdvertisementController extends Controller
{
    public function list()
    {
        $carPartAdvertisement = CarPartAdvertisement::where('user_id', auth()->user()->id)->get();
        return view('seller.car_part_advertisement.list', get_defined_vars());
    }

    public function add()
    {
    	$carMake = CarMake::all();
        $category = Category::all();

        return view('seller.car_part_advertisement.add', get_defined_vars());
    }

    public function edit($id = null)
    {
        $carPartAdvertisement = CarPartAdvertisement::find($id);
        $carMake = CarMake::all();
        $carModel = CarModel::where('id_car_make',$carPartAdvertisement->car_make_id)->get();
        $carTrim = CarTrim::where('id_car_model',$carPartAdvertisement->car_model_id)->get();
        $category = Category::all();
        $subCategory = SubCategory::where('category_id',$carPartAdvertisement->category_id)->get();
        return view('seller.car_part_advertisement.edit', get_defined_vars());
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

    public function subCategory($id = null){
        $subCategory = SubCategory::where('category_id',$id)->get();
        $subCategoryCount = SubCategory::where('category_id',$id)->count();
        return [view('ajax.seller.sub_category', get_defined_vars())->render(), $subCategoryCount];
    }

    public function save(Request $req, $id = null)
    {
        $messages = [
            'title.required' => 'Title field is required',
            'car_make.required' => 'Car make field is required',
            'car_model.required' => 'Car model field is required',
            'category_id.email' => 'Category field is required',
            'sub_category_id.required' => 'Subcategory field is required',
            'description.confirmed' => 'Description field is required',

        ];
        $rules = [
            'title' => 'required',
            'car_make' => 'required',
            'car_model'=>'required',
            'category_id' => 'required',
            'sub_category_id'=> "required",
            'description' =>'required',
            'images' => [new ImagesRule()],
        ];

        $this->validate($req,$rules,$messages);
        if (is_null($id))
        {
            $carPartAdvertisement = CarPartAdvertisement::create([
                'title'=>$req->title,
                'slug'=> Str::slug($req->title),
                'car_make_id' => $req->car_make,
                'car_model_id'=>$req->car_model,
                'car_trim_id'=>$req->car_trim,
                'category_id'=>$req->category_id,
                'sub_category_id'=>$req->sub_category_id,
                'description'=>$req->description,
                'user_id' => auth()->user()->id,
                'price'=> $req->price,
            ]);
            if($req->has('images'))
            {
                for($i=0; $i < sizeof($req->images); $i++)
                {
                    $uploaded_image=uploadFile($req->images[$i], 'car_part-images/'.Str::slug($carPartAdvertisement->id));
                    CarPartImage::create([
                    'car_part_advertisement_id' => $carPartAdvertisement->id,
                    'image' => $uploaded_image,
                    ]);
                }
            }
        }
        else
        {
            $carPartAdvertisement = CarPartAdvertisement::find($id)->update([
                'title'=>$req->title,
                'slug'=>Str::slug($req->title),
                'car_make_id' => $req->car_make,
                'car_model_id'=>$req->car_model,
                'car_trim_id'=>$req->car_trim,
                'category_id'=>$req->category_id,
                'sub_category_id'=>$req->sub_category_id,
                'description'=>$req->description,
                'user_id' => auth()->user()->id,
                'price'=> $req->price,
            ]);

            if($req->has('images'))
            {

                for($i=0; $i < sizeof($req->images); $i++)
                {
                    CarPartImage::create([
                    'car_part_advertisement_id' => $id,
                    'image' => uploadFile($req->images[$i], 'car_part-images/'.Str::slug($id))
                    ]);
                }
            }
        }

        return redirect()->route('seller.car.part.advertisement.list')->with('success', 'Car Part Advertisement List Updated Successfully');
    }

    public function delete($id = null)
    {
        CarPartAdvertisement::find($id)->delete();
        return redirect()->route('seller.car.part.advertisement.list')->with('success', 'CarPartAdvertisement Deleted');
    }

    public function deleteImage($id = null)
    {
        $image = CarPartImage::find($id)->delete();
        return response()->json(['success' => 'Image Deleted Successfully']);
    }

    public function changeStatus(Request $req)
    {
        CarPartAdvertisement::where('id',$req->id)
            ->update(['status'=>$req->status]);
        return back()->with("success","Status Updated Successfully");
    }

}
