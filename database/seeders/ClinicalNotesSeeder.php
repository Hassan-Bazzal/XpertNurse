<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 

class ClinicalNotesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('clinical_notes')->insert([
            [
                'patient_id' => 1,
                'author_id' => 3, // Nurse Jane
                'note_date' => now()->toDateString(),
                'note_text' => 'Patient stable. Temp 37.2°C, BP 120/80.',
            ],
            [
                'patient_id' => 2,
                'author_id' => 2, // Dr. John
                'note_date' => now()->toDateString(),
                'note_text' => 'Adjusted insulin dosage. Monitor glucose daily.',
            ],
        ]);
    }
}
