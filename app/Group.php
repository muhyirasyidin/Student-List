<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $connection = 'main';

    public function users()
    {
      return $this->belongsToMany('App\User');
    }
}
