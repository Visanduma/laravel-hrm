<?php 

namespace Visanduma\LaravelHrm\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Visanduma\LaravelHrm\Models\EmployeeLeave;
use Visanduma\LaravelHrm\Models\LeaveType;
use Visanduma\LaravelHrm\Enums\LeaveStatusEnum;

class EmployeeLeaveFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EmployeeLeave::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'emp_id' => 1,
            'leave_type_id' => LeaveType::factory(),
            'from_date' => '2024-05-28',
            'to_date' => '2024-05-30',
            'no_of_days' => 4,
            'half_day' => null,
            'reason' => "personal",
            'status' => LeaveStatusEnum::APPROVED
        ];
    }
}