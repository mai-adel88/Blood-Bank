<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model 
{

    protected $table = 'posts';
    public $timestamps = true;
    protected $fillable = array('title', 'content', 'image', 'is_favourite', 'user_id','category_id');
    protected $appends = ['is_favourite'];

    

    public function clients()
    {
    	return $this->morphToMany('App\Client', 'clientable');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function getIsFavouriteAttribute()
    {
        /*
        $check = $this->whereHas('clients',function ($query){
            $query->where('clientables.client_id',request()->user()->id);
            $query->where('clientables.clientable_id',$this->id);
            $query->where('clientables.clientable_type','App\Post');

        })->first();
*/
        //$check = $this->fresh()->whereHas('clients',function ($query){
          //  $query->where('clientables.client_id',request()->user()->id);
        //})->first();
        $userId = null;
        if (request()->user()) {
            $userId = request()->user()->id;
        }elseif (auth('client-web')->user()->id) {
            $userId = auth('client-web')->user()->id;
        }
        $check = $this->fresh()->clients()->where('clients.id',$userId)->first();
        //dd($check);
        
        if ($check)
        {
            return true;
        }
        return false;
    }

}