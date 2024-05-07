<?php

namespace Visanduma\LaravelHrm\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Visanduma\LaravelHrm\Models\LeavePolicy;
use Visanduma\LaravelHrm\Models\LeavePolicyAllocatable;

class LeavePolicyAllocatableFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = LeavePolicyAllocatable::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'leave_policy_id' => LeavePolicy::factory(),
            'allocatable_id' => 1,
            'allocatable_type' => 'employee',
            'from_date' => '2024-01-02',
            'to_date' => '2027-10-15',
        ];
    }
}
