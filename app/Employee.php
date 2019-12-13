<?php

namespace App;

use Hoyvoy\CrossDatabase\Eloquent\Model;
use Wildside\Userstamps\Userstamps;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use Userstamps;
    use SoftDeletes;
    
    protected $guarded = ['id'];
    protected $connection = 'employee';

    public function classes()
    {
        return $this->belongsToMany(Classes::class);
    }

    public function dormitory()
    {
        return $this->hasOne('App\Dorm');
    }
}
