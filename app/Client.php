<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model 
{

    protected $table = 'clients';
    public $timestamps = true;
    protected $fillable = array('email', 'name', 'd_o_b','blood_type_id', 'last_donation_date', 'city_id', 'password', 'phone', 'pin_code', 'is_active');

    public function donationOrders()
    {
        return $this->hasMany('App\DonationRequest');
    }
    public function bloodType()
    {
        return $this->belongsTo('App\BloodType');
    }

    public function city()
    {
        return $this->belongsTo('App\City');
    }

    public function posts()
    {
        return $this->morphedByMany('App\Post', 'clientable');
    }

    public function notifcations()
    {
        return $this->morphedByMany('App\Notification', 'clientable');
    }

    public function bloodTypes()
    {
        return $this->morphedByMany('App\BloodType', 'clientable');
    }

    public function governorates()
    {
        return $this->morphedByMany('App\Governorate', 'clientable');
    }

    public function tokens()
    {
        return $this->hasMany('App\Token');
    }

    protected $hidden = [
        'password', 'api_token',
    ];
}