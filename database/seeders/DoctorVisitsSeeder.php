<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 

class DoctorVisitsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('doctor_visits')->insert([
            [
                'patient_id' => 1,
                'doctor_id' => 2, // matches "Dr. John Smith" in UsersTableSeeder
                'visit_date' => now()->subDay()->toDateString(),
                'reason_for_visit' => 'Headache and fever',
                'diagnosis' => 'Viral infection',
                'treatment_plan' => 'Paracetamol and rest',
            ],
            [
                'patient_id' => 2,
                'doctor_id' => 2,
                'visit_date' => now()->toDateString(),
                'reason_for_visit' => 'High blood sugar',
                'diagnosis' => 'Diabetes management',
                'treatment_plan' => 'Insulin adjustment',
            ],
        ]);
    }
}
