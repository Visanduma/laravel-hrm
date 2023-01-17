<?php

namespace Visanduma\LaravelHrm\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Visanduma\LaravelHrm\LaravelHrm
 */
class LaravelHrm extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Visanduma\LaravelHrm\LaravelHrm::class;
    }
}
