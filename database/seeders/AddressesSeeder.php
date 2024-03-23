<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddressesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define the data to be seeded
        $addresses = [
            [
                'streetAddress' => '123 Main Street',
                'city' => 'Anytown',
                'state' => 'AnyState',
                'postalCode' => '12345',
                'country' => 'AnyCountry',
            ],
            [
                'streetAddress' => '456 Elm Street',
                'city' => 'Othertown',
                'state' => 'OtherState',
                'postalCode' => '67890',
                'country' => 'OtherCountry',
            ],
            // Add more addresses as needed
        ];

        // Insert the data into the addresses table
        DB::table('addresses')->insert($addresses);
    }
}
