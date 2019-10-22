<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{

    protected $table = 'settings';
    public $timestamps = true;
    protected $fillable = array('phone', 'email','facebook_social', 'twitter_social', 'google_plus', 'instagram', 'whatsapp', 'youtupe', 'about_app');

}
