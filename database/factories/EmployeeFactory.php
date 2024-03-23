<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'iDNumber' => $this->faker->unique()->regexify('[A-Z]{3}[0-9]{3}'), // Example: ABC123
            'accountNo' => $this->faker->unique()->regexify('[A-Z0-9]{6}'), // Example: AC1234
            'name' => $this->faker->firstName,
            // 'lastName' => $this->faker->lastName,
            'dateOfBirth' => $this->faker->date,
            'gender' => $this->faker->randomElement(['Male', 'Female', 'Other']),
            'status' => $this->faker->randomElement(['Active', 'OnLeave', 'Inactive']),
            'contactInformationID' => $this->faker->numberBetween(1, 100), // Adjust as needed
            'email' => $this->faker->unique()->safeEmail,
            'photo' => $this->faker->unique()->imageUrl(60,60),
            'password' => bcrypt('password'), // Hashing default password
            'addressID' => $this->faker->numberBetween(1, 100), // Adjust as needed
            'departmentID' => $this->faker->numberBetween(1, 100), // Adjust as needed
            'roleID' => $this->faker->numberBetween(1, 100), // Adjust as needed
            'hireDate' => $this->faker->date,
            'remember_token' => Str::random(10),
            'email_verified_at' => now(),
            //
        ];
    }

     /**
     * Indicate that the model's email address should be unverified.
     *
     * @return $this
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
