<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;
use Illuminate\Database\Eloquent\SoftDeletes;

class Classes_employee extends Model
{
     protected $connection = 'employee';
     protected $table = 'classes_employee';
}
