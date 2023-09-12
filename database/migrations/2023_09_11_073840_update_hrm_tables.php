<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hrm_company_branches', function (Blueprint $table) {
            $table->json('location')->nullable()->change();
        });

        Schema::table('hrm_employee_designations', function (Blueprint $table) {
            $table->text('desig_desc')->nullable()->change();
        });

        Schema::table('hrm_leave_policies', function (Blueprint $table) {
            $table->string('abbreviation')->nullable()->change();
        });

        Schema::table('hrm_salary_structures', function (Blueprint $table) {
            $table->string('abbreviation')->nullable()->change();
        });

        Schema::table('hrm_employee_grades', function (Blueprint $table) {
            $table->string('abbreviation')->nullable()->change();
        });

        Schema::table('hrm_employees', function (Blueprint $table) {
            $table->string('bank_account')->nullable()->change();
            $table->unsignedBigInteger('emp_desig_id')->nullable()->change();
            $table->unsignedBigInteger('emp_grade_id')->nullable()->change();
        });

        Schema::table('hrm_employee_personal', function (Blueprint $table) {
            $table->string('value')->nullable()->change();
            $table->unsignedBigInteger('emp_id')->nullable()->change();
        });

        Schema::table('hrm_holidays', function (Blueprint $table) {
            $table->string('reason')->nullable()->change();
        });

        Schema::table('hrm_leave_policy_leaves', function (Blueprint $table) {
            $table->unsignedBigInteger('leave_policy_id')->nullable()->change();
            $table->unsignedBigInteger('leave_type_id')->nullable()->change();
        });

        Schema::table('hrm_employee_leave_allocations', function (Blueprint $table) {
            $table->unsignedInteger('allocatable_id')->nullable()->change();
            $table->string('allocatable_type')->nullable()->change();
            $table->date('from_date')->nullable()->change();
            $table->date('to_date')->nullable()->change();
            $table->unsignedBigInteger('leave_policy_id')->nullable()->change();
        });

        Schema::table('hrm_employee_leaves', function (Blueprint $table) {
            $table->float('no_of_days')->nullable()->change();
            $table->date('from_date')->nullable()->change();
            $table->date('to_date')->nullable()->change();
            $table->tinyText('reason')->nullable()->change();
            $table->string('status')->nullable()->change();
            $table->unsignedBigInteger('emp_id')->nullable()->change();
            $table->unsignedBigInteger('leave_type_id')->nullable()->change();
        });

        Schema::table('hrm_payroll_periods', function (Blueprint $table) {
            $table->date('start_date')->nullable()->change();
            $table->date('end_date')->nullable()->change();
        });

        Schema::table('hrm_salary_components', function (Blueprint $table) {
            $table->string('abbreviation')->nullable()->change();
            $table->text('desc')->nullable()->change();
        });

        Schema::table('hrm_salary_structure_components', function (Blueprint $table) {
            $table->double('amount')->nullable()->change();
            $table->string('formula')->nullable()->change();
            $table->unsignedBigInteger('sal_struct_id')->nullable()->change();
            $table->unsignedBigInteger('sal_comp_id')->nullable()->change();
        });

        Schema::table('hrm_salary_structure_assigns', function (Blueprint $table) {
            $table->unsignedInteger('assignable_id')->nullable()->change();
            $table->string('assignable_type')->nullable()->change();
            $table->date('from_date')->nullable()->change();
            $table->date('to_date')->nullable()->change();
            $table->unsignedBigInteger('sal_struct_id')->nullable()->change();
        });

        Schema::table('hrm_salary_slip_items', function (Blueprint $table) {
            $table->string('itemable_type')->nullable()->change();
            $table->unsignedInteger('itemable_id')->nullable()->change();
            $table->double('amount')->nullable()->change();
        });

        Schema::table('hrm_employee_attendances', function (Blueprint $table) {
            $table->unsignedBigInteger('emp_id')->nullable()->change();
        });

        Schema::table('hrm_payroll_employees', function (Blueprint $table) {
            $table->double('transfer_amount')->nullable()->change();
            $table->string('payment_status')->nullable()->change();
            $table->unsignedBigInteger('sal_slip_id')->nullable()->change();
            $table->unsignedBigInteger('payment_method_id')->nullable()->change();
            $table->unsignedBigInteger('payment_account_id')->nullable()->change();
        });

        Schema::table('hrm_designation_skills', function (Blueprint $table) {
            $table->unsignedBigInteger('desig_id')->nullable()->change();
            $table->unsignedBigInteger('skill_id')->nullable()->change();
        });

        Schema::table('hrm_expense_claims', function (Blueprint $table) {
            $table->string('reason')->nullable()->change();
            $table->unsignedBigInteger('emp_id')->nullable()->change();
            $table->unsignedBigInteger('payroll_period_id')->nullable()->change();
            $table->unsignedBigInteger('claim_type_id')->nullable()->change();
        });

        Schema::table('hrm_payroll_entries', function (Blueprint $table) {
            $table->unsignedBigInteger('payroll_period_id')->nullable()->change();
            $table->unsignedBigInteger('desig_id')->nullable()->change();
        });

        Schema::table('hrm_salary_slips', function (Blueprint $table) {
            $table->unsignedBigInteger('emp_id')->nullable()->change();
            $table->unsignedBigInteger('payroll_entry_id')->nullable()->change();
        });

        Schema::table('hrm_payment_method_details', function (Blueprint $table) {
            $table->unsignedBigInteger('payment_method_id')->nullable()->change();
        });

        Schema::table('hrm_settings', function (Blueprint $table) {
            $table->json('properties')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hrm_company_branches', function (Blueprint $table) {
            $table->json('location')->change();
        });

        Schema::table('hrm_employee_designations', function (Blueprint $table) {
            $table->text('desig_desc')->change();
        });

        Schema::table('hrm_leave_policies', function (Blueprint $table) {
            $table->string('abbreviation')->change();
        });

        Schema::table('hrm_salary_structures', function (Blueprint $table) {
            $table->string('abbreviation')->change();
        });

        Schema::table('hrm_employee_grades', function (Blueprint $table) {
            $table->string('abbreviation')->change();
        });

        Schema::table('hrm_employees', function (Blueprint $table) {
            $table->string('bank_account')->change();
            $table->unsignedBigInteger('emp_desig_id')->change();
            $table->unsignedBigInteger('emp_grade_id')->change();
        });

        Schema::table('hrm_employee_personal', function (Blueprint $table) {
            $table->string('value')->change();
            $table->unsignedBigInteger('emp_id')->change();
        });

        Schema::table('hrm_holidays', function (Blueprint $table) {
            $table->string('reason')->change();
        });

        Schema::table('hrm_leave_policy_leaves', function (Blueprint $table) {
            $table->unsignedBigInteger('leave_policy_id')->change();
            $table->unsignedBigInteger('leave_type_id')->change();
        });

        Schema::table('hrm_employee_leave_allocations', function (Blueprint $table) {
            $table->unsignedInteger('allocatable_id')->nullable()->change();
            $table->string('allocatable_type')->change();
            $table->date('from_date')->change();
            $table->date('to_date')->change();
            $table->unsignedBigInteger('leave_policy_id')->change();
        });

        Schema::table('hrm_employee_leaves', function (Blueprint $table) {
            $table->float('no_of_days')->change();
            $table->date('from_date')->change();
            $table->date('to_date')->change();
            $table->tinyText('reason')->change();
            $table->string('status')->change();
            $table->unsignedBigInteger('emp_id')->change();
            $table->unsignedBigInteger('leave_type_id')->change();
        });

        Schema::table('hrm_payroll_periods', function (Blueprint $table) {
            $table->date('start_date')->change();
            $table->date('end_date')->change();
        });

        Schema::table('hrm_salary_components', function (Blueprint $table) {
            $table->string('abbreviation')->change();
            $table->text('desc')->change();
        });

        Schema::table('hrm_salary_structure_components', function (Blueprint $table) {
            $table->double('amount')->change();
            $table->string('formula')->change();
            $table->unsignedBigInteger('sal_struct_id')->change();
            $table->unsignedBigInteger('sal_comp_id')->change();
        });

        Schema::table('hrm_salary_structure_assigns', function (Blueprint $table) {
            $table->unsignedInteger('assignable_id')->change();
            $table->string('assignable_type')->change();
            $table->date('from_date')->change();
            $table->date('to_date')->change();
            $table->unsignedBigInteger('sal_struct_id')->change();
        });

        Schema::table('hrm_salary_slip_items', function (Blueprint $table) {
            $table->string('itemable_type')->change();
            $table->unsignedInteger('itemable_id')->change();
            $table->double('amount')->change();
        });

        Schema::table('hrm_payroll_employees', function (Blueprint $table) {
            $table->double('transfer_amount')->change();
            $table->string('payment_status')->change();
            $table->unsignedBigInteger('sal_slip_id')->change();
            $table->unsignedBigInteger('payment_method_id')->change();
            $table->unsignedBigInteger('payment_account_id')->change();
        });

        Schema::table('hrm_expense_claims', function (Blueprint $table) {
            $table->string('reason')->change();
            $table->unsignedBigInteger('emp_id')->change();
            $table->unsignedBigInteger('payroll_period_id')->change();
            $table->unsignedBigInteger('claim_type_id')->change();
        });

        Schema::table('hrm_payroll_entries', function (Blueprint $table) {
            $table->unsignedBigInteger('payroll_period_id')->change();
            $table->unsignedBigInteger('desig_id')->change();
        });

        Schema::table('hrm_salary_slips', function (Blueprint $table) {
            $table->unsignedBigInteger('emp_id')->change();
            $table->unsignedBigInteger('payroll_entry_id')->change();
        });

        Schema::table('hrm_payment_method_details', function (Blueprint $table) {
            $table->unsignedBigInteger('payment_method_id')->change();
        });

        Schema::table('hrm_employee_attendances', function (Blueprint $table) {
            $table->unsignedBigInteger('emp_id')->change();
        });

        Schema::table('hrm_designation_skills', function (Blueprint $table) {
            $table->unsignedBigInteger('desig_id')->change();
            $table->unsignedBigInteger('skill_id')->change();
        });

        Schema::table('hrm_settings', function (Blueprint $table) {
            $table->json('properties')->change();
        });
    }
};
