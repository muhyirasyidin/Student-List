<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentDetail extends Model
{
    use Userstamps;
    use SoftDeletes;
    
    protected $guarded = ['id'];
    protected $connection = 'student';

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
