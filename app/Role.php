<?php
namespace App;

use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
	protected $table = 'roles';
	protected $fillable = ['name', 'display_name', 'description'];
    protected $appends = ['permission_list'];

	public function permissions()
    {
        return $this->belongsToMany('App\Permission');
    }

	public function users()
    {
        return $this->belongsToMany('App\User');
    }

    public function getPermissionListAttribute()
    {
        return $this->permssions()->pluck('id')->toArray();
    }
}