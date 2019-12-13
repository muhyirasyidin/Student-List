<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dorm extends Model
{
    // use Userstamps;
    // use SoftDeletes;

    protected $guarded = ['id'];

    protected $connection = 'dorm';
    protected $table = 'dormitories';

    public function student()
    {
        return $this->belongsToMany('App\Student', 'dorm_student', 'student_id', 'dorm_id');
    }

    public function employee()
    {
        return $this->belongsTo('App\Employee');
    }
}
