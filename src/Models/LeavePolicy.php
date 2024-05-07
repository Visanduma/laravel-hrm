<?php

namespace Visanduma\LaravelHrm\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Visanduma\LaravelHrm\Database\Factories\LeavePolicyFactory;

class LeavePolicy extends Model
{
    use HasFactory;
    
    protected $table = 'hrm_leave_policies';

    protected $guarded = [];

    protected static function newFactory()
    {
        return LeavePolicyFactory::new();
    }

    public function policyLeaves()
    {
        return $this->hasMany(LeavePolicyLeave::class, 'leave_policy_id');
    }

    public function employees()
    {
        return $this->morphedByMany(Employee::class,
            'allocatable',
            'hrm_employee_leave_allocations',
            'leave_policy_id'
        );
    }

    public function grades()
    {
        return $this->morphedByMany(EmployeeGrade::class,
            'allocatable',
            'hrm_employee_leave_allocations',
            'leave_policy_id'
        );
    }

    public function allocators()
    {
        return $this->hasMany(LeavePolicyAllocatable::class, 'leave_policy_id', 'id');
    }
}
