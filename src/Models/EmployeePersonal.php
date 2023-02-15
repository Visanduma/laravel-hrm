<?php

namespace Visanduma\LaravelHrm\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeePersonal extends Model
{
    protected $table = 'hrm_employee_personal';

    protected $guarded = [];

    public static function insertUpdateBulk(Employee $employee, $request)
    {
        EmployeePersonal::updateOrCreate(['emp_id' => $employee->id, 'field' => 'first_name'], ['value' => $request->first_name]);
        EmployeePersonal::updateOrCreate(['emp_id' => $employee->id, 'field' => 'middle_name'], ['value' => $request->middle_name]);
        EmployeePersonal::updateOrCreate(['emp_id' => $employee->id, 'field' => 'last_name'], ['value' => $request->last_name]);
        EmployeePersonal::updateOrCreate(['emp_id' => $employee->id, 'field' => 'dob'], ['value' => $request->dob]);
        EmployeePersonal::updateOrCreate(['emp_id' => $employee->id, 'field' => 'addressLine1'], ['value' => $request->addressLine1]);
        EmployeePersonal::updateOrCreate(['emp_id' => $employee->id, 'field' => 'addressLine2'], ['value' => $request->addressLine2]);
        EmployeePersonal::updateOrCreate(['emp_id' => $employee->id, 'field' => 'addressLine3'], ['value' => $request->addressLine3]);
        EmployeePersonal::updateOrCreate(['emp_id' => $employee->id, 'field' => 'nic'], ['value' => $request->nic]);
        EmployeePersonal::updateOrCreate(['emp_id' => $employee->id, 'field' => 'mobile'], ['value' => $request->mobile]);
    }
}
