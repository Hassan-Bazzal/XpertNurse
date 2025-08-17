<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 

class VitalsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('vitals')->insert([
            [
                'patient_id' => 1,
                'blood_pressure' => '120/80',
                'heart_rate' => 72,
                'temperature' => 37.2,
                'respiratory_rate' => 18,
                'oxygen_saturation' => 98,
                'recorded_at' => now(),
            ],
            [
                'patient_id' => 2,
                'blood_pressure' => '130/85',
                'heart_rate' => 80,
                'temperature' => 38.0,
                'respiratory_rate' => 20,
                'oxygen_saturation' => 96,
                'recorded_at' => now(),
            ],
        ]);
    }
}
