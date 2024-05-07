<?php

namespace Visanduma\LaravelHrm\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Visanduma\LaravelHrm\Database\Factories\LeavePolicyLeaveFactory;

class LeavePolicyLeave extends Model
{
    use HasFactory;
    
    protected $table = 'hrm_leave_policy_leaves';

    protected $guarded = [];

    protected static function newFactory()
    {
        return LeavePolicyLeaveFactory::new();
    }

    public function leaveType()
    {
        return $this->belongsTo(LeaveType::class, 'leave_type_id');
    }

    public function leavePolicy()
    {
        return $this->belongsTo(LeavePolicy::class, 'leave_policy_id');
    }
}
