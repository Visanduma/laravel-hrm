<?php

namespace Visanduma\LaravelHrm\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Claim extends Model
{
    protected $table = 'hrm_expense_claims';

    protected $guarded = [];

    protected $attributes = [
        'status' => 'Pending',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'emp_id');
    }

    public function payrollPeriod()
    {
        return $this->belongsTo(PayrollPeriod::class, 'payroll_period_id');
    }

    public function claimType()
    {
        return $this->belongsTo(ClaimType::class, 'claim_type_id');
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
