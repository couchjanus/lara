<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    /**
     * Fillable fields for a Profile
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'telephone', 'gender', 'birthday', 'image', 'addressline1', 'addressline2', 'bio', 'postcode', 'country', 'user_id', 'twitter_username', 'github_username'
    ];

    /**
     * A profile belongs to a user
     *
     * @return mixed
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
