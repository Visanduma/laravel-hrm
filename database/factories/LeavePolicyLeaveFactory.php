<?php 

namespace Visanduma\LaravelHrm\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Visanduma\LaravelHrm\Models\LeavePolicyLeave;
use Visanduma\LaravelHrm\Models\LeavePolicy;
use Visanduma\LaravelHrm\Models\LeaveType;

class LeavePolicyLeaveFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = LeavePolicyLeave::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'leave_policy_id' => LeavePolicy::factory(),
            'leave_type_id' => LeaveType::factory(), 
            'annual_allocation' => 20,
        ];
    }
}
