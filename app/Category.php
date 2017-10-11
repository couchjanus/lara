<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function latestPost()
    {
      return $this->hasOne('App\Post')->latest();
    }

}
