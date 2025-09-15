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
                'name' => env('ADMIN_NAME', 'Admin User'),
    'email' => env('ADMIN_EMAIL', 'admin@xpertnurse.com'),
    'password' => Hash::make(env('DEFAULT_ADMIN_PASSWORD')),
    'role' => 'admin',
    'phone' => env('ADMIN_PHONE', '70000001'),
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
