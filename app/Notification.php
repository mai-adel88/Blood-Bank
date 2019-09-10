<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model 
{

    protected $table = 'notifications';
    public $timestamps = true;
    protected $fillable = array('content');

    public function donation()
    {
        return $this->belongsTo('App\DonationRequest');
    }

    public function clients()
    {
    	return $this->morphToMany('App\Client', 'clientable');
    }

}