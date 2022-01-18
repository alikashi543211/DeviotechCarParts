<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScrapYardImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'scrap_yard_advertisement_id',
        'image',
    ];

    public function scrapPartAdvertisement(){
        return $this->belongsTo('App\Models\ScrapYardAdvertisement');
    }
}
