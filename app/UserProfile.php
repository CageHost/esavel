<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'user_id', 'profile_type', 'bio',
    ];

    public function user()
    {
      return $this->belongsTo('App\User');
    }
}
