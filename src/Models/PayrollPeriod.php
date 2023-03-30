<?php

namespace Visanduma\LaravelHrm\Models;

use Illuminate\Database\Eloquent\Model;

class PayrollPeriod extends Model
{
    protected $table = 'hrm_payroll_periods';

    protected $guarded = [];

    public function claims()
    {
        return $this->hasMany(Claim::class, 'emp_id');
    }
}
