<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScrapYardAdvertisement extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function scrapYardImages(){
    	return $this->hasMany('App\Models\ScrapYardImage');
    }
    public function carMake()
    {
    	return $this->hasOne('App\Models\CarMake','id_car_make' ,'car_make_id');
    }
    public function carModel()
    {
    	return $this->hasOne('App\Models\CarModel','id_car_model','car_model_id');
    }
    public function carTrim()
    {
    	return $this->hasOne('App\Models\CarTrim','id_car_trim','car_trim_id');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
