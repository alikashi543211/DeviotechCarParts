<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function strings()
    {
    	return $this->hasMany('App\Models\Setting');
    }
}
