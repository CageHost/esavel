<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventType extends Model
{
  protected $table = 'event_types';

  protected $fillable = [
    'name', 'alias', 'description'
  ];

  public function events()
  {
      return $this->belongsToMany('App\Event');
  }
}
