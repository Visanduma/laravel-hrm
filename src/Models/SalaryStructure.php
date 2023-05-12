<?php

namespace Visanduma\LaravelHrm\Models;

use Illuminate\Database\Eloquent\Model;

class SalaryStructure extends Model
{
    protected $table = 'hrm_salary_structures';

    protected $guarded = [];

    public function salComponents()
    {
        return $this->belongsToMany(
            SalaryComponent::class,
            'hrm_salary_structure_components',
            'sal_struct_id',
            'sal_comp_id')
            ->withPivot('amount', 'formula');
    }

    public function employees()
    {
        return $this->morphedByMany(Employee::class,
            'assignable',
            'hrm_salary_structure_assigns',
            'sal_struct_id'
        );
    }

    public function grades()
    {
        return $this->morphedByMany(EmployeeGrade::class,
            'assignable',
            'hrm_salary_structure_assigns',
            'sal_struct_id'
        );
    }

    public function assignors()
    {
        return $this->hasMany(SalaryStructurable::class, 'sal_struct_id', 'id');
    }
}
