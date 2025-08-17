<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 

class MedicinesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('medicines')->insert([
            [
                'name' => 'Paracetamol',
                'description' => 'Pain relief and fever reduction',
                'dosage_form' => 'tablet',
                'strength' => '500mg',
                'manufacturer' => 'Acme Pharma',
            ],
            [
                'name' => 'Amoxicillin',
                'description' => 'Broad-spectrum antibiotic',
                'dosage_form' => 'capsule',
                'strength' => '500mg',
                'manufacturer' => 'HealthCorp',
            ],
            [
                'name' => 'Insulin',
                'description' => 'Diabetes treatment',
                'dosage_form' => 'injection',
                'strength' => '100 IU/mL',
                'manufacturer' => 'MediLife',
            ],
        ]);
    }
}
