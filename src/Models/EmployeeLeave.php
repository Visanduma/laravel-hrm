<?php

namespace Visanduma\LaravelHrm\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Visanduma\LaravelHrm\Database\Factories\EmployeeLeaveFactory;
use Visanduma\LaravelHrm\Enums\LeaveStatusEnum;

class EmployeeLeave extends Model
{
    use HasFactory;

    protected $table = 'hrm_employee_leaves';

    protected $guarded = [];

    protected $casts = [
        'status' => LeaveStatusEnum::class,
    ];

    protected $attributes = [
        'status' => LeaveStatusEnum::PENDING,
    ];

    protected static function newFactory()
    {
        return EmployeeLeaveFactory::new();
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'emp_id');
    }

    public function leaveType()
    {
        return $this->belongsTo(LeaveType::class, 'leave_type_id');
    }
}
