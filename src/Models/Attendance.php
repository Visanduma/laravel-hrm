<?php

namespace Visanduma\LaravelHrm\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $table = 'hrm_employee_attendances';

    protected $guarded = [];
	
	public function employee()
    {
        return $this->belongsTo(Employee::class, 'emp_id');
    }
}
