<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 

class SchedulesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('schedules')->insert([
            [
                'patient_id' => 1,
                'assigned_user_id' => 3, // Nurse Jane
                'appointment_date' => now()->addDay()->toDateString(),
                'appointment_time' => '10:30:00',
                'type' => 'visit',
                'notes' => 'Check temperature and BP',
            ],
            [
                'patient_id' => null,
                'assigned_user_id' => 3,
                'appointment_date' => now()->addDays(2)->toDateString(),
                'appointment_time' => '08:00:00',
                'type' => 'shift',
                'notes' => 'Morning shift',
            ],
        ]);
    }
}
