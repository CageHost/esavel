<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
  protected $fillable = [
    'name', 'avatar', 'background', 'description', 'date', 'time', 'location'
  ];
}
