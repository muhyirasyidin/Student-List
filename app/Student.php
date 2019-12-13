<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;

class Student extends Model
{
    use Userstamps;
    
    protected $guarded = ['id'];
    protected $connection = 'student';
    protected $table = 'students';

    public function detail()
    {
        return $this->hasOne(StudentDetail::class);
    }

    public function parents()
    {
        // student_parent itu nama tabel penghubungnya 2 parameter kebelakang itu nama coloumn nya
        return $this->belongsToMany(StudentParent::class, 'student_parents', 'student_id', 'parent_id');
    }

    public function classes()
    {
        return $this->belongsToMany(Classes::class);
    }

    public function dorm()
    {
        return $this->belongsToMany('App\Dorm', 'dorm_student', 'student_id', 'dorm_id');
    }
}
