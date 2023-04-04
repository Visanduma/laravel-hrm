<?php

namespace Visanduma\LaravelHrm\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class SalaryComponent extends Model
{
    protected $table = 'hrm_salary_components';

    protected $guarded = [];

    public function salStructures()
    {
        return $this->belongsToMany(SalaryStructure::class, 'hrm_salary_structure_components', 'sal_comp_id', 'sal_struct_id');
    }

    public function slips(): MorphToMany
    {
        return $this->morphToMany(SalarySlip::class,
            'itemable',
            'hrm_salary_slip_items',
            'itemable_id',
            'sal_slip_id'
        );
    }

    public function isEarning()
    {
        return $this->type == 'earning' ? true : false;
    }
}
