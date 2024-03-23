<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define the data to be seeded
        $roles = [
            [
                'roleName' => 'Manager',
                // 'DepartmentID' => 1, // Assuming a department with ID 1 exists
                'responsibilities' => 'Oversee overall operations',
            ],
            [
                'roleName' => 'Farm Manager',
                // 'DepartmentID' => 2, // Assuming a department with ID 2 exists
                'responsibilities' => 'Oversee department operations',
            ],
            // Add more roles as needed
        ];

        // Insert the data into the roles table
        DB::table('roles')->insert($roles);
    }
}
