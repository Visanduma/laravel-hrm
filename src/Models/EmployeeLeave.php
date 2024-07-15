<?php

namespace Visanduma\LaravelHrm\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
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

    protected function fromDate(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => Carbon::createFromFormat('Y-m-d', $value)->format('j/n/Y'),
            set: fn (string $value) => Carbon::createFromFormat('j/n/Y', $value)->format('Y-m-d'),
        );
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'emp_id');
    }

    public function leaveType()
    {
        return $this->belongsTo(LeaveType::class, 'leave_type_id');
    }

    public function slips(): MorphToMany
    {
        return $this->morphToMany(SalarySlip::class,
            'itemable',
            'hrm_salary_slip_items',
            'itemable_id',
            'sal_slip_id'
        );
    }
}
