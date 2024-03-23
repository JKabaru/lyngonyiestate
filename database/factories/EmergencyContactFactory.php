<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\EmergencyContact;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Models\EmergencyContact>
 */
class EmergencyContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model = EmergencyContact::class;


    public function definition(): array
    {
        return [
            'contactName' => $this->faker->name,
            'relationship' => $this->faker->randomElement(['spouse', 'parent', 'sibling', 'friend']),
            'phone' => $this->faker->phoneNumber,
        ];
    }
}
