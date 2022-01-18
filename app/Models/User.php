<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Cashier\Billable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function sellerProfile(){
        return $this->hasOne('App\Models\SellerProfile');
    }

    public function seller_reviews()
    {
        return $this->hasMany('App\Models\Review','seller_id');
    }

    public function user_reviews()
    {
        return $this->hasMany('App\Models\Review','user_id');
    }

    public function favourite_advertisements()
    {
        return $this->hasMany('App\Models\FavouriteAdvertisement','user_id');
    }

    public function mollieCustomerFields() {
        return [
            'email' => $this->email,
            'name' => $this->name,
        ];
    }
}
