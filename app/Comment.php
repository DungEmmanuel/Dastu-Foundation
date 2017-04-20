<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	protected $guarded = ['id'];

    public function getUserIDAttribute($value)
    {
        return ucfirst($value);
    }
	
    public function post() 
    {
        return $this->belongsTo('App\Post'); 
    }

    public function myusers()
    {
    	return $this->belongsTo('App\User');
    }

    

}
