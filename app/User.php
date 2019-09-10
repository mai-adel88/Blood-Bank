<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
    use Notifiable;
    use EntrustUserTrait;

    protected $table = 'users';
    public $timestamps = true;
    protected $fillable = array('name', 'email', 'password');
    protected $appends = ['roles_list'];
    


    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }
    public function permssions()
    {
        return $this->hasMany('App\Permission');
    }

    public function getRolesListAttribute()
    {
        return $this->roles()->pluck('id')->toArray();
    }

    

    protected $hidden = [
        'password', 'remember_token',
    ];

}