<?php

namespace Visanduma\LaravelHrm\Models;

use Illuminate\Database\Eloquent\Model;
use Visanduma\LaravelHrm\Enums\LeaveStatusEnum;

class EmployeeLeave extends Model
{
    protected $table = 'hrm_employee_leaves';

    protected $guarded = [];

    protected $casts = [
        'status' => LeaveStatusEnum::class
    ];

    protected $attributes = [
        'status' => LeaveStatusEnum::PENDING
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'emp_id');
    }

    public function leaveType()
    {
        return $this->belongsTo(LeaveType::class, 'leave_type_id');
    }
}
