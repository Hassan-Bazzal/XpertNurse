<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Hash;


class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
DB::table('users')->insert([
            [
                'name' => 'Admin User',
                'email' => 'admin@xpertnurse.com',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'phone' => '70000001',
            ],
            [
                'name' => 'Dr. John Smith',
                'email' => 'doctor@xpertnurse.com',
                'password' => Hash::make('password'),
                'role' => 'doctor',
                'phone' => '70000002',
            ],
            [
                'name' => 'Nurse Jane Doe',
                'email' => 'nurse@xpertnurse.com',
                'password' => Hash::make('password'),
                'role' => 'nurse',
                'phone' => '70000003',
            ],
        ]);
    }
}
