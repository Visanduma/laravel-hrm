<?php

namespace Visanduma\LaravelHrm\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Visanduma\LaravelHrm\Database\Factories\LeaveTypeFactory;

class LeaveType extends Model
{
    use HasFactory;

    protected $table = 'hrm_leave_types';

    protected $guarded = [];

    protected static function newFactory()
    {
        return LeaveTypeFactory::new();
    }

    public function policyLeaves()
    {
        return $this->hasMany(LeavePolicyLeave::class, 'leave_type_id');
    }
}
