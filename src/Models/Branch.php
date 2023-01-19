<?php

namespace Visanduma\LaravelHrm\Models;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $table = 'hrm_company_branches';

    protected $guarded = [];

    protected $casts = [
        'location' => 'array',
    ];

    public function employees()
    {
        return $this->hasMany(Employee::class, 'emp_branch_id', 'id');
    }

    public function payrollEntries()
    {
        return $this->hasMany(PayrollEntry::class, 'branch_id', 'id');
    }
}
