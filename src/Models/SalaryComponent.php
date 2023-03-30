<?php

namespace Visanduma\LaravelHrm\Models;

use Illuminate\Database\Eloquent\Model;


class SalaryComponent extends Model
{
    protected $table = 'hrm_salary_components';

    protected $guarded = [];

    public function salStructures()
    {
        return $this->belongsToMany(SalaryStructure::class, 'hrm_salary_structure_components', 'sal_comp_id', 'sal_struct_id');
    }
}
