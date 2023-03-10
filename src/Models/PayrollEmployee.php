<?php

namespace Visanduma\LaravelHrm\Models;

use Illuminate\Database\Eloquent\Model;

class PayrollEmployee extends Model
{
    protected $table = 'hrm_payroll_employees';

    protected $guarded = [];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'emp_id');
    }

    public function salarySlip()
    {
        return $this->belongsTo(SalarySlip::class, 'sal_slip_id');
    }

    public function payrollEntry()
    {
        return $this->belongsTo(PayrollEntry::class, 'payroll_entry_id');
    }
}
