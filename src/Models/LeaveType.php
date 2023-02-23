<?php

namespace Visanduma\LaravelHrm\Models;

use Illuminate\Database\Eloquent\Model;

class LeaveType extends Model
{
    protected $table = 'hrm_leave_types';

    protected $guarded = [];

    public function policyLeaves()
    {
        return $this->hasMany(LeavePolicyLeave::class, 'leave_type_id');
    }
}
