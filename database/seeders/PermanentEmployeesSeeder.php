<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class PermanentEmployeesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define the data to be seeded
        $employees = [
            [
                // 'EmployeeID' => 1, // You may adjust this value based on your data

                'idNumber' => 'EMP001',
                'accountNo' => 'AC001',
                'name' => 'John Doe',
                // 'lastName' => 'Doe',
                'dateOfBirth' => '1990-05-15',
                'gender' => 'Male',
                'status' => 'Active',
                'contactInformationID' => 1, // You may adjust this value based on your data
                'email' => 'jadmin@gmail.com',
                'password' => bcrypt('password'), // Hash the password
                // 'AddressID' => 1, // You may adjust this value based on your data
                // 'DepartmentID' => 1, // You may adjust this value based on your data
                // 'RoleID' => 1, // You may adjust this value based on your data
                'hireDate' => '2020-01-01',
                'salary' => 50000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                // 'EmployeeID' => 2, // You may adjust this value based on your data

                'iDNumber' => 'EMP002',
                'accountNo' => 'AC002',
                'name' => 'Jane Smith',
                // 'lastName' => 'Smith',
                'dateOfBirth' => '1985-08-20',
                'gender' => 'Female',
                'status' => 'OnLeave',
                'contactInformationID' => 2, // You may adjust this value based on your data
                'email' => 'jane.smith@example.com',
                'password' => Hash::make('12345678'), // Hash the password
                // 'AddressID' => 2, // You may adjust this value based on your data
                // 'DepartmentID' => 2, // You may adjust this value based on your data
                // 'RoleID' => 2, // You may adjust this value based on your data
                'hireDate' => '2019-05-10',
                'salary' => 60000.00,
                'created_at' => now(),
                'updated_at' => now(),
                
            ],
            // Add more employees as needed
        ];

        // Insert the data into the employees table
        DB::table('users')->insert($employees);
    }
}
