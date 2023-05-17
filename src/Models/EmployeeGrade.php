<?php

namespace Visanduma\LaravelHrm\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeGrade extends Model
{
    protected $table = 'hrm_employee_grades';

    protected $guarded = [];

    public function policies()
    {
        return $this->morphToMany(LeavePolicy::class,
            'allocatable',
            'hrm_employee_leave_allocations',
            'allocatable_id',
            'leave_policy_id'
        );
    }

    public function salStructures()
    {
        return $this->morphToMany(SalaryStructure::class,
            'assignable',
            'hrm_salary_structure_assigns',
            'assignable_id',
            'sal_struct_id'
        );
    }

    // methods

    public function activePolicy()
    {
        return $this->policies()->whereDate('from_date', '<=', now()->format('Y-m-d'))
            ->whereDate('to_date', '>=', now()->format('Y-m-d'))->first();
    }

    public function salStructureActive()
    {
        return $this->salStructures()->where('active', true)->first();
    }
}
