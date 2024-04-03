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
        DB::table('departments')->insert([
            [
                'departmentName' => 'Farm 1',
                'description' => 'Description of Farm 1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'departmentName' => 'Farm 2',
                'description' => 'Description of Farm 2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'departmentName' => 'Farm 3',
                'description' => 'Description of Farm 3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Add more sample data as needed
    }
}
