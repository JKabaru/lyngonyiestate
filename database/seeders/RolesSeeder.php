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
        DB::table('roles')->insert([
            [
                'roleName' => 'Manager',
                'description' => 'Description of Manager role',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'roleName' => 'Farm Manager',
                'description' => 'Description of Farm Manager role',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more sample data as needed
        ]);
    }
}

