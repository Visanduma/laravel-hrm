<?php 

namespace Visanduma\LaravelHrm\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Visanduma\LaravelHrm\Models\LeavePolicy;

class LeavePolicyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = LeavePolicy::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->lexify('policy-????'),
            'abbreviation' => $this->faker->regexify('[A-Z]{5}[0-4]{3}'), 
        ];
    }
}
