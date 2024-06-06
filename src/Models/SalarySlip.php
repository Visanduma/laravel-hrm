<?php

namespace Visanduma\LaravelHrm\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class SalarySlip extends Model
{
    protected $table = 'hrm_salary_slips';

    protected $guarded = [];

    public function items()
    {
        return $this->hasMany(SalarySlipItem::class, 'sal_slip_id');
    }

    public function claims(): MorphToMany
    {
        return $this->morphedByMany(Claim::class,
            'itemable',
            'hrm_salary_slip_items',
            'sal_slip_id'
        );
    }

    public function components(): MorphToMany
    {
        return $this->morphedByMany(SalaryComponent::class,
            'itemable',
            'hrm_salary_slip_items',
            'sal_slip_id'
        );
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'emp_id');
    }

    public function payroll()
    {
        return $this->hasOne(PayrollEmployee::class, 'sal_slip_id');
    }
}
