<?php

namespace Visanduma\LaravelHrm\Enums;

enum LeaveStatusEnum : string
{
    case PENDING = 'Pending';
    case APPROVED = 'Approved';
    case REJECTED = 'Rejected';
}