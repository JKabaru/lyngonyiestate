<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Department;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Models\Department>
 */
class DepartmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Department::class;

    public function definition(): array
    {
        return [
            'departmentName' => $this->faker->word,
            'managerID' => $this->faker->numberBetween(1, 10),
            'description' => $this->faker->sentence,
        ];
    }
}
