<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $connection = 'main';
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'status', 'token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function groups()
    {
      return $this->belongsToMany('App\Group')->withTimestamps();
    }

    public function hasGroup($group)
    {
      if ($this->groups()->where('group', $group)->first()) {
        return true;
      }
      return false;
    }

    public function hasAnyGroup($groups)
    {
      if (is_array($groups)) {
        foreach ($groups as $group) {
          if ($this->hasGroup($group)) {
            return true;
          }
        }
        return false;
      } else {
        if ($this->hasGroup($groups)) {
          return true;
        }
        return false;
      }
    }

    public function authorizeGroups($groups)
    {
      if ($this->hasAnyGroup($groups)) {
        return true;
      }
      abort(401, 'Unauthorized');
    }
}
