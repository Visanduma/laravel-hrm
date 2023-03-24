<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('hrm_company_branches', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->json('location');
            $table->timestamps();
        });

        Schema::create('hrm_departments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('parent_id')->nullable()->constrained('hrm_departments')->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();
        });

        Schema::create('hrm_employee_groups', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('hrm_health_insurance_providers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('hrm_employee_designations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('desig_desc');
            $table->timestamps();
        });

        Schema::create('hrm_employment_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('hrm_leave_policies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('abbreviation');
            $table->timestamps();
        });

        Schema::create('hrm_salary_structures', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('abbreviation');
            $table->timestamps();
        });

        Schema::create('hrm_employee_grades', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('abbreviation');
            $table->timestamps();
        });

        Schema::create('hrm_employees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('emp_type_id')->nullable()->constrained('hrm_employment_types')->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId('emp_branch_id')->nullable()->constrained('hrm_company_branches')->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId('emp_dept_id')->nullable()->constrained('hrm_departments')->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId('emp_desig_id')->constrained('hrm_employee_designations')->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId('emp_grade_id')->constrained('hrm_employee_grades')->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId('emp_group_id')->nullable()->constrained('hrm_employee_groups')->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId('emp_health_provider_id')->nullable()->constrained('hrm_health_insurance_providers')->cascadeOnUpdate()->restrictOnDelete();
            $table->string('insurance_no')->nullable();
            $table->string('bank_account');
            $table->timestamps();
        });

        Schema::create('hrm_employee_personal', function (Blueprint $table) {
            $table->id();
            $table->foreignId('emp_id')->constrained('hrm_employees')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('field');
            $table->string('value');
            $table->timestamps();
        });

        Schema::create('hrm_leave_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->tinyInteger('max_allowed');
            $table->tinyInteger('max_continuous_allowed');
            $table->timestamps();
        });

        Schema::create('hrm_holidays', function (Blueprint $table) {
            $table->id();
            $table->date('holiday_date');
            $table->string('reason');
            $table->timestamps();
        });

        Schema::create('hrm_leave_policy_leaves', function (Blueprint $table) {
            $table->id();
            $table->foreignId('leave_policy_id')->constrained('hrm_leave_policies')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('leave_type_id')->constrained('hrm_leave_types')->cascadeOnUpdate()->cascadeOnDelete();
            $table->tinyInteger('annual_allocation');
            $table->timestamps();
        });

        Schema::create('hrm_employee_leave_allocations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('leave_policy_id')->constrained('hrm_leave_policies')->cascadeOnUpdate()->cascadeOnDelete();
            $table->unsignedInteger('allocatable_id');
            $table->string('allocatable_type');
            $table->date('from_date');
            $table->date('to_date');
            $table->timestamps();
        });

        Schema::create('hrm_employee_leaves', function (Blueprint $table) {
            $table->id();
            $table->foreignId('emp_id')->constrained('hrm_employees')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('leave_type_id')->constrained('hrm_leave_types')->cascadeOnUpdate()->cascadeOnDelete();
            $table->date('from_date');
            $table->date('to_date');
            $table->float('no_of_days', 3, 1);
            $table->string('half_day', 10)->nullable();
            $table->tinyText('reason');
            $table->string('status', 12);
            $table->timestamps();
        });

        Schema::create('hrm_payroll_periods', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('start_date');
            $table->date('end_date');
            $table->timestamps();
        });

        Schema::create('hrm_salary_components', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('abbreviation');
            $table->text('desc');
            $table->enum('type', ['earning', 'deduction']);
            $table->timestamps();
        });

        Schema::create('hrm_salary_structure_components', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sal_struct_id')->constrained('hrm_salary_structures')->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId('sal_comp_id')->constrained('hrm_salary_components')->cascadeOnUpdate()->restrictOnDelete();
            $table->double('amount', 8, 2);
            $table->string('formula');
            $table->timestamps();
        });

        Schema::create('hrm_salary_structure_assigns', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sal_struct_id')->constrained('hrm_salary_structures')->cascadeOnUpdate()->restrictOnDelete();
            $table->unsignedInteger('assignable_id');
            $table->string('assignable_type');
            $table->date('from_date');
            $table->date('to_date');
            $table->timestamps();
        });

        Schema::create('hrm_payroll_entries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('payroll_period_id')->constrained('hrm_payroll_periods')->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId('branch_id')->nullable()->constrained('hrm_company_branches')->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId('dept_id')->nullable()->constrained('hrm_departments')->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId('desig_id')->constrained('hrm_employee_designations')->cascadeOnUpdate()->restrictOnDelete();
            $table->timestamps();
        });

        Schema::create('hrm_salary_slips', function (Blueprint $table) {
            $table->id();
            $table->foreignId('emp_id')->constrained('hrm_employees')->cascadeOnUpdate()->restrictOnDelete();
            $table->timestamps();
        });

        Schema::create('hrm_salary_slip_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sal_slip_id')->constrained('hrm_salary_slips')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('sal_comp_id')->constrained('hrm_salary_components')->cascadeOnUpdate()->restrictOnDelete();
            $table->double('amount', 8, 2);
            $table->timestamps();
        });

        Schema::create('hrm_payment_methods', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('hrm_payment_method_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('payment_method_id')->constrained('hrm_payment_methods')->cascadeOnDelete()->restrictOnDelete();
            $table->string('account_name');
            $table->string('account_number')->nullable();
            $table->timestamps();
        });

        Schema::create('hrm_payroll_employees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('payroll_entry_id')->constrained('hrm_payroll_entries')->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId('emp_id')->constrained('hrm_employees')->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId('sal_slip_id')->constrained('hrm_salary_slips')->cascadeOnUpdate()->cascadeOnDelete();
            $table->double('transfer_amount', 8, 2);
            $table->foreignId('payment_method_id')->constrained('hrm_payment_methods')->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId('payment_account_id')->constrained('hrm_payment_method_details')->cascadeOnUpdate()->restrictOnDelete();
            $table->string('payment_status', 12);
            $table->timestamps();
        });

        Schema::create('hrm_employee_attendances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('emp_id')->constrained('hrm_employees')->cascadeOnUpdate()->restrictOnDelete();
            $table->date('attend_date');
            $table->enum('status', ['Present', 'Absent', 'On Leave']);
            $table->dateTime('arrival_at')->nullable();
            $table->dateTime('leave_at')->nullable();
            $table->timestamps();
        });

        Schema::create('hrm_claim_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('hrm_expense_claims', function (Blueprint $table) {
            $table->id();
            $table->foreignId('emp_id')->constrained('hrm_employees')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('payroll_period_id')->constrained('hrm_payroll_periods')->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId('claim_type_id')->constrained('hrm_claim_types')->cascadeOnUpdate()->restrictOnDelete();
            $table->date('claimed_at');
            $table->double('claimed_amount', 8, 2);
            $table->string('reason');
            $table->enum('status',  ['Approved', 'Rejected', 'Pending']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('hrm_expense_claims');
        Schema::dropIfExists('hrm_claim_types');
        Schema::dropIfExists('hrm_employee_attendances');
        Schema::dropIfExists('hrm_payroll_employees');
        Schema::dropIfExists('hrm_payment_method_details');
        Schema::dropIfExists('hrm_payment_methods');
        Schema::dropIfExists('hrm_salary_slip_items');
        Schema::dropIfExists('hrm_salary_slips');
        Schema::dropIfExists('hrm_payroll_entries');
        Schema::dropIfExists('hrm_salary_structure_assigns');
        Schema::dropIfExists('hrm_salary_structure_components');
        Schema::dropIfExists('hrm_salary_components');
        Schema::dropIfExists('hrm_payroll_periods');
        Schema::dropIfExists('hrm_employee_leaves');
        Schema::dropIfExists('hrm_employee_leave_allocations');
        Schema::dropIfExists('hrm_leave_policy_leaves');
        Schema::dropIfExists('hrm_holidays');
        Schema::dropIfExists('hrm_leave_types');
        Schema::dropIfExists('hrm_employee_personal');
        Schema::dropIfExists('hrm_employees');
        Schema::dropIfExists('hrm_employee_grades');
        Schema::dropIfExists('hrm_salary_structures');
        Schema::dropIfExists('hrm_leave_policies');
        Schema::dropIfExists('hrm_employment_types');
        Schema::dropIfExists('hrm_employee_designations');
        Schema::dropIfExists('hrm_health_insurance_providers');
        Schema::dropIfExists('hrm_employee_groups');
        Schema::dropIfExists('hrm_departments');
        Schema::dropIfExists('hrm_company_branches');
    }
};
