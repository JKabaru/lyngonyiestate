<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'John Doe',
            'idNumber' => '123456789',
            'accountNo' => '1234567890',
            'dateOfBirth' => '1990-01-01',
            'gender' => 'male',
            'status' => 'active',
            'contactInformation' => '1234567890',
            'email' => 'john@example.com',
            'password' => bcrypt('password'),
            'address' => '123 Main St, City',
            'hireDate' => '2022-01-01',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Add more sample data as needed
    }
}
