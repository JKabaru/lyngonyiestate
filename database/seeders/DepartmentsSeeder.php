<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define the data to be seeded
        $departments = [
            [
                'departmentName' => 'Piggery',
                // 'ManagerID' => 1, // Assuming a manager with ID 1 exists
                'description' => 'Piggery Department',
            ],
            [
                'departmentName' => 'Poultry',
                // 'ManagerID' => 2, // Assuming a manager with ID 2 exists
                'description' => 'Poultry Department',
            ],
            // Add more departments as needed
        ];

        // Insert the data into the departments table
        DB::table('departments')->insert($departments);
    }
}
