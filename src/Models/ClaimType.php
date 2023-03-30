<?php

namespace Visanduma\LaravelHrm\Models;

use Illuminate\Database\Eloquent\Model;

class ClaimType extends Model
{
    protected $table = 'hrm_claim_types';

    protected $guarded = [];

    public function claims()
    {
        return $this->hasMany(Claim::class, 'emp_id');
    }
}
