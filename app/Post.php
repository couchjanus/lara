<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    public $timestamps = true;

    protected $fillable = [
        'title', 'content'
    ];

    public function category() 
    {
        return $this->belongsTo('App\Category');
    }
}
