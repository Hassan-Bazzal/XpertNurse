<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 

class PatientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('patients')->insert([
            [
                'first_name' => 'Michael',
                'last_name' => 'Brown',
                'date_of_birth' => '1985-07-20',
                'gender' => 'male',
                'contact_number' => '718111111',
                'email' => 'michael.brown@example.com',
                'address' => '123 Main St',
                'emergency_contact_name' => 'Sarah Brown',
                'emergency_contact_number' => '709999991',
            ],
            [
                'first_name' => 'Emily',
                'last_name' => 'Clark',
                'date_of_birth' => '1992-03-15',
                'gender' => 'female',
                'contact_number' => '718222222',
                'email' => 'emily.clark@example.com',
                'address' => '456 Oak Ave',
                'emergency_contact_name' => 'James Clark',
                'emergency_contact_number' => '709999992',
            ],
        ]);
    }
}
