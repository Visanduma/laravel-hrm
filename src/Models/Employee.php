<?php

namespace Visanduma\LaravelHrm\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'hrm_employees';

    protected $guarded = [];

    public function empType()
    {
        return $this->belongsTo(EmployementType::class, 'emp_type_id');
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class, 'emp_branch_id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'emp_dept_id');
    }

    public function designation()
    {
        return $this->belongsTo(Designation::class, 'emp_desig_id');
    }
}
