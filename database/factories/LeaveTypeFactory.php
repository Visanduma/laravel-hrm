<?php

namespace Visanduma\LaravelHrm\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Visanduma\LaravelHrm\Models\LeaveType;

class LeaveTypeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = LeaveType::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->randomElement(['Duty', 'Casual', 'Sick']),
            'max_allowed' => 15,
            'max_continuous_allowed' => 5,
        ];
    }
}
