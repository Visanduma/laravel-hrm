<?php

namespace Visanduma\LaravelHrm\Models;

use Illuminate\Database\Eloquent\Model;

class PayrollEntry extends Model
{
    protected $table = 'hrm_payroll_entries';

    protected $guarded = [];

    public function payrollPeriod()
    {
        return $this->belongsTo(PayrollPeriod::class, 'payroll_period_id', 'id');
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id', 'id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'dept_id', 'id');
    }

    public function designation()
    {
        return $this->belongsTo(Designation::class, 'desig_id', 'id');
    }
}
