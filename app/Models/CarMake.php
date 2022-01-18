<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarMake extends Model
{
   use HasFactory;
   protected $table ='car_make';
   public function carPartAdvertisement()
   {
    	return $this->belongsTo('App\Models\CarPartAdvertisement');
   }
    
}
