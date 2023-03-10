<?php

namespace Visanduma\LaravelHrm\Models;

use Illuminate\Database\Eloquent\Model;

class SalaryStructurable extends Model
{
    protected $table = 'hrm_salary_structure_assigns';

    protected $guarded = [];

    public function structurables()
    {
        return $this->morphTo();
    }
}
