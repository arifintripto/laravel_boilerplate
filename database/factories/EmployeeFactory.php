<?php

namespace Database\Factories;

use App\Models\Department;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employee::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'type' => $this->faker->numberBetween(0, 2),
            'department_id' => Department::factory(),
            'mobile' => $this->faker->phoneNumber,
            'alt_mobile' => $this->faker->phoneNumber,
            'email' => $this->faker->email,
            'nid' => $this->faker->numberBetween(20000114, 99999999),
            'joining_date' => $this->faker->date()

        ];
    }
}
