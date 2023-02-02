<?php

namespace Visanduma\LaravelHrm\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'hrm_payment_methods';

    protected $guarded = [];

    public function info()
    {
        return $this->hasMany(PaymentInfo::class, 'payment_method_id');
    }
}
