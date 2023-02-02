<?php

namespace Visanduma\LaravelHrm\Models;

use Illuminate\Database\Eloquent\Model;

class SalarySlipItem extends Model
{
    protected $table = 'hrm_salary_slip_items';

    protected $guarded = [];

    public function slip()
    {
        return $this->belongsTo(SalarySlip::class, 'sal_slip_id');
    }
}
