<?php

namespace Visanduma\LaravelHrm\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $table = 'hrm_skills';

    protected $guarded = [];

    public function designations()
    {
        return $this->belongsToMany(Designation::class, 'hrm_designation_skills', 'skill_id', 'desig_id');
    }
}
