<?php

namespace Visanduma\LaravelHrm\Models;

use Illuminate\Database\Eloquent\Model;

class SalarySlip extends Model
{
    protected $table = 'hrm_salary_slips';

    protected $guarded = [];

    public function items()
    {
        return $this->hasMany(SalarySlipItem::class, 'sal_slip_id');
    }
}
