<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// Translatable Package Trait
// use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
// use Astrotomic\Translatable\Translatable;

class Blog extends Model
{
    use HasFactory;

    // use Translatable;

    protected $guarded=[];

    public $translatedAttributes = ['title', 'description'];

    public function blog_category()
    {
    	return $this->belongsTo('App\Models\BlogCategory','category_id');
    }
}
