<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Database\Seeders\UsersSeeder;
use Database\Seeders\DepartmentsSeeder;
use Database\Seeders\RolesSeeder;
use Database\Seeders\CasualWorkersSeeder;



use App\Models\other_Models\Address;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        $this->call(CasualWorkersSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(DepartmentsSeeder::class);
        // $this->call(RolesSeeder::class);
        
        // \App\Models\Employee::factory(8)->create();
        // \App\Models\Address::factory(10)->create();
        // \App\Models\ContactInformation::factory(10)->create();
        // \App\Models\Department::factory(10)->create();
        // \App\Models\EmergencyContact::factory(10)->create();
        // \App\Models\Role::factory(10)->create();
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
