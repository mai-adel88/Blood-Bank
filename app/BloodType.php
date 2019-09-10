<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BloodType extends Model 
{

    protected $table = 'blood_types';
    public $timestamps = true;
    protected $fillable = array('type');

    public function clients()
    {
        return $this->hasMany('App\Client');
    }

    public function notificationClients()
    {
    	return $this->morphToMany('App\Client', 'clientable');
    }

}