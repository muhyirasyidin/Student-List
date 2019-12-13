<?php

namespace App;

use Hoyvoy\CrossDatabase\Eloquent\Model;
use Wildside\Userstamps\Userstamps;
use Illuminate\Database\Eloquent\SoftDeletes;

class Classes extends Model
{
    use Userstamps;
    use SoftDeletes;

    protected $guarded = ['id'];
    protected $connection = 'student';

    public function students()
    {
        return $this->belongsToMany(Student::class);
    }

    public function employee()
    {
        return $this->belongsToMany(Employee::class);
    }
}
