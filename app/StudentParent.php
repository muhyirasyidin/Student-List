<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentParent extends Model
{
    use Userstamps;
    use SoftDeletes;
    
    protected $connection = 'student';

    protected $table = 'parents';

    public function students()
    {
        return $this->belongsToMany(Student::class);
    }
}
