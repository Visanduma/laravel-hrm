<?php

namespace Visanduma\LaravelHrm\Models;

use Illuminate\Database\Eloquent\Model;

class LeavePolicyAllocatable extends Model
{
    protected $table = 'hrm_employee_leave_allocations';

    protected $guarded = [];

    public function policyAllocatable()
    {
        return $this->morphTo();
    }
}
