<?php

namespace Visanduma\LaravelHrm\Models;

use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    protected $table = 'hrm_employee_designations';

    protected $guarded = [];

    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'hrm_designation_skills', 'desig_id', 'skill_id');
    }
}
