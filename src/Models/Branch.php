<?php

namespace Visanduma\LaravelHrm\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Visanduma\LaravelHrm\Database\Factories\BranchFactory;

class Branch extends Model
{
    use HasFactory;

    protected $table = 'hrm_company_branches';

    protected $guarded = [];

    protected static function newFactory()
    {
        return BranchFactory::new();
    }

    public function employees()
    {
        return $this->hasMany(Employee::class, 'emp_branch_id', 'id');
    }

    public function payrollEntries()
    {
        return $this->hasMany(PayrollEntry::class, 'branch_id', 'id');
    }
}
