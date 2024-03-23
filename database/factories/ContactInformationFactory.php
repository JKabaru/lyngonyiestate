<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ContactInformation;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Models\ContactInformation>
 */
class ContactInformationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     * 
     */
    protected $model = ContactInformation::class;

    public function definition(): array
    {
        return [
            'employeeID' => $this->faker->unique()->numberBetween(1, 100),
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'addressID' => $this->faker->numberBetween(1, 100),
            'emergencyContactID' => $this->faker->numberBetween(1, 100),
        ];
    }
}
