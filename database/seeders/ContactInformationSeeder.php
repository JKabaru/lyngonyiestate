<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class ContactInformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define the data to be seeded
        $contactInformation = [
            [
                // 'EmployeeID' => 1, // Reference to the employee ID
                'phone' => '1234567890',
                'email' => 'john.doe@example.com',
                // 'AddressID' => 1, // Reference to the address ID
                'emergencyContactID' => 1, // Reference to the emergency contact ID
            ],
            [
                // 'EmployeeID' => 2, // Reference to the employee ID
                'phone' => '9876543210',
                'email' => 'jane.smith@example.com',
                // 'AddressID' => 2, // Reference to the address ID
                'emergencyContactID' => 2, // Reference to the emergency contact ID
            ],
            // Add more contact information as needed
        ];

        // Insert the data into the contact_information table
        DB::table('contact_information')->insert($contactInformation);
    }
}
