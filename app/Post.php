<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = ['id'];

    public function categories() 
    {
         return $this->belongsToMany('App\Category')->withTimestamps(); 
    }

    public function comment() 
    {
        return $this->hasMany('App\Comment', 'post_id'); 
    }
}
