<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmergencyContactsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define the data to be seeded
        $emergencyContacts = [
            [
                'contactName' => 'John Smith',
                'relationship' => 'Spouse',
                'phone' => '1234567890',
            ],
            [
                'contactName' => 'Jane Doe',
                'relationship' => 'Parent',
                'phone' => '9876543210',
            ],
            // Add more emergency contacts as needed
        ];

        // Insert the data into the emergency_contacts table
        DB::table('emergency_contacts')->insert($emergencyContacts);
    }
}
