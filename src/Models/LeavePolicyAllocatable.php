<?php

namespace Visanduma\LaravelHrm\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Visanduma\LaravelHrm\Database\Factories\LeavePolicyAllocatableFactory;

class LeavePolicyAllocatable extends Model
{
    use HasFactory;

    protected $table = 'hrm_employee_leave_allocations';

    protected $guarded = [];

    protected static function newFactory()
    {
        return LeavePolicyAllocatableFactory::new();
    }

    public function policyAllocatable()
    {
        return $this->morphTo();
    }
}
