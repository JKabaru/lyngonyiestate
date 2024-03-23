<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Role;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Models\Role>
 */
class RoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Role::class;


    public function definition(): array
    {
        return [
            'roleName' => $this->faker->word,
            'departmentID' => $this->faker->numberBetween(1, 10),
            'responsibilities' => $this->faker->sentence,
        ];
    }
}
