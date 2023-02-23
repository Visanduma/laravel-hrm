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
         'hrm_employee_leave_allocations'
        );
    }

    // methods

    public function activePolicy()
    {
        return $this->policies()->whereDate('from_date', '<=', now()->format('Y-m-d'))
        ->whereDate('to_date', '>=', now()->format('Y-m-d'))->first();
    }
}
