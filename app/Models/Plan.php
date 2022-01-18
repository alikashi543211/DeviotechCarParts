<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Plan extends Model implements TranslatableContract
{
    use HasFactory;
    protected $guarded = [];

    protected $table = 'plans';

    use Translatable;
    
    public $translatedAttributes = ['name', 'description'];

}
