<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CasualWorkersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('casual_workers')->insert([
            [
                'name' => 'Jane Doe',
                'email' => 'jane@example.com',
                'contactInformation' => '1234567890',
                'address' => '456 Main St, City',
                'description' => 'Description of casual worker 1',
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bob Smith',
                'email' => 'bob@example.com',
                'contactInformation' => '0987654321',
                'address' => '789 Elm St, Town',
                'description' => 'Description of casual worker 2',
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more sample data as needed
        ]);
    }
}
