<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 

class MedicinesPatientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('medicines_patients')->insert([
            [
                'patient_id' => 1,
                'medicine_id' => 1,
                'dosage' => '1 tablet twice daily',
                'start_date' => now()->subDays(5)->toDateString(),
                'end_date' => now()->addDays(5)->toDateString(),
                'instructions' => 'After meals',
            ],
            [
                'patient_id' => 1,
                'medicine_id' => 2,
                'dosage' => '1 capsule every 8 hours',
                'start_date' => now()->subDays(2)->toDateString(),
                'end_date' => now()->addDays(5)->toDateString(),
                'instructions' => 'Finish the course',
            ],
            [
                'patient_id' => 2,
                'medicine_id' => 3,
                'dosage' => 'As prescribed',
                'start_date' => now()->toDateString(),
                'end_date' => null,
                'instructions' => 'Refrigerate if needed',
            ],
        ]);
    }
}
