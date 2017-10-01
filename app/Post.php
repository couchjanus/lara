<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    public $timestamps = true;

    // protected $fillable = [
    //     'title', 'content'
    // ];

    public function category() 
    {
        return $this->belongsTo('App\Category');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    public function getTagListAttribute()
    {
        return $this->tags->lists('id');
    }
}
