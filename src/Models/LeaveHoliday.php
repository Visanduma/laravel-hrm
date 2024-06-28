<?php

namespace Visanduma\LaravelHrm\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class LeaveHoliday extends Model
{
    protected $table = 'hrm_holidays';

    protected $guarded = [];

    protected function holidayDate(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => Carbon::createFromFormat('Y-m-d', $value)->format('j/n/Y'),
            // set: fn (string $value) => Carbon::createFromFormat('j/n/Y', $value)->format('Y-m-d'),
        );
    }
}
