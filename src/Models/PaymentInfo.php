<?php

namespace Visanduma\LaravelHrm\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentInfo extends Model
{
    protected $table = 'hrm_payment_method_details';

    protected $guarded = [];

    public function payment()
    {
        return $this->belongsTo(Payment::class, 'payment_method_id');
    }
}
