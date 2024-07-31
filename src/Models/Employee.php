<?php

namespace Visanduma\LaravelHrm\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Visanduma\LaravelHrm\Enums\LeaveStatusEnum;

class Employee extends Model
{
    protected $table = 'hrm_employees';

    protected $guarded = [];

    protected $appends = ['first_name', 'middle_name', 'last_name', 'addressLine1', 'addressLine2', 'addressLine3', 'dob', 'nic', 'mobile'];

    // Relationships

    public function user()
    {
        return $this->belongsTo(User::class);
    }

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

    public function grade()
    {
        return $this->belongsTo(EmployeeGrade::class, 'emp_grade_id');
    }

    public function personal()
    {
        return $this->hasMany(EmployeePersonal::class, 'emp_id', 'id');
    }

    public function policies()
    {
        return $this->morphToMany(LeavePolicy::class,
            'allocatable',
            'hrm_employee_leave_allocations',
            'allocatable_id',
            'leave_policy_id'
        );
    }

    public function salStructures()
    {
        return $this->morphToMany(SalaryStructure::class,
            'assignable',
            'hrm_salary_structure_assigns',
            'assignable_id',
            'sal_struct_id'
        );
    }

    public function leaves()
    {
        return $this->hasMany(EmployeeLeave::class, 'emp_id');
    }

    public function claims()
    {
        return $this->hasMany(Claim::class, 'emp_id');
    }

    public function slips()
    {
        return $this->hasMany(SalarySlip::class, 'emp_id');
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

    // methods

    public function activePolicy()
    {
        return $this->policies()->whereDate('from_date', '<=', now()->format('Y-m-d'))
            ->whereDate('to_date', '>=', now()->format('Y-m-d'))->latest()->first();
    }

    public function leaveTypes()
    {
        if (! is_null($this->activePolicy())) {
            $policyLeaves = $this->activePolicy()->policyLeaves()->get();
        } else {
            $policyLeaves = $this->grade->activePolicy()->policyLeaves()->get();
        }

        return $policyLeaves;
    }

    public function yearLeaves($leave_type_id = null)
    {
        return $this->leaves()
            ->when($leave_type_id, function ($query) use ($leave_type_id) {
                return $query->where('leave_type_id', $leave_type_id);
            })
            ->whereYear('from_date', '=', date('Y'))
            ->where('status', LeaveStatusEnum::APPROVED)
            ->get();
    }

    public function leaveType($leave_type_id)
    {
        return $this->leaveTypes()->where('leave_type_id', $leave_type_id)->first();
    }

    public function remainingLeaves($leave_type_id): int
    {
        return $this->leaveType($leave_type_id)->annual_allocation - $this->yearLeaves($leave_type_id)->count();
    }

    public function salStructureActive()
    {
        return $this->salStructures()->where('active', true)->first();
    }

    public function approvedClaims($payroll_period_id)
    {
        return $this->claims()->where([['status', '=', 'Approved'], ['payroll_period_id', '=', $payroll_period_id]])->get();
    }

    public function hasSlip($payroll_entry_id): bool
    {
        return $this->slips()->where('payroll_entry_id', '=', $payroll_entry_id)->exists();
    }
}
