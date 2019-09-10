<?php

namespace App; 

use Illuminate\Database\Eloquent\Model;

class DonationRequest extends Model 
{

    protected $table = 'donation_requests';
    public $timestamps = true;
    protected $fillable = array('full_name' ,'phone','age', 'hospital_name', 'hospital_address', 'num_of_bag','blood_type_id', 'notes', 'latitude', 'longitude', 'city_id');



    public function city()
    {
        return $this->belongsTo('App\City');
    }

    public function bloodType()
    {
        return $this->belongsTo('App\BloodType');
    }

    public function notifications()
    {
        return $this->hasMany('App\Notification','donation_req_id');
    }

}