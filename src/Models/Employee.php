<?php

namespace Visanduma\LaravelHrm\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'hrm_employees';

    protected $guarded = [];

    protected $appends = ['first_name', 'middle_name', 'last_name', 'addressLine1', 'addressLine2', 'addressLine3', 'dob', 'nic', 'mobile'];

    // Relationships

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

    public function personal()
    {
        return $this->hasMany(EmployeePersonal::class, 'emp_id', 'id');
    }

    // Custom Attributes

    public function getFirstNameAttribute()
    {
        return $this->personal()->where('field', 'first_name')->first()->value ?? null;
    }

    public function getMiddleNameAttribute()
    {
        return $this->personal()->where('field', 'middle_name')->first()->value ?? null;
    }

    public function getLastNameAttribute()
    {
        return $this->personal()->where('field', 'last_name')->first()->value ?? null;
    }

    public function getAddressLine1Attribute()
    {
        return $this->personal()->where('field', 'addressLine1')->first()->value ?? null;
    }

    public function getAddressLine2Attribute()
    {
        return $this->personal()->where('field', 'addressLine2')->first()->value ?? null;
    }

    public function getAddressLine3Attribute()
    {
        return $this->personal()->where('field', 'addressLine3')->first()->value ?? null;
    }

    public function getDobAttribute()
    {
        return $this->personal()->where('field', 'dob')->first()->value ?? null;
    }

    public function getNicAttribute()
    {
        return $this->personal()->where('field', 'nic')->first()->value ?? null;
    }

    public function getMobileAttribute()
    {
        return $this->personal()->where('field', 'mobile')->first()->value ?? null;
    }
}
