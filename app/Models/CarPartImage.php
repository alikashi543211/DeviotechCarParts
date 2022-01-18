<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarPartImage extends Model
{
    use HasFactory;
    protected $fillable = [
        'car_part_advertisement_id',
        'image',
    ];

    public function carPartAdvertisement(){
        return $this->belongsTo('App\Models\CarPartAdvertisement');
    }

}
