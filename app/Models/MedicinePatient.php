<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicinePatient extends Model
{
    use HasFactory;
    protected $table = 'medicines_patients';
    protected $fillable = ['patient_id', 'medicine_id', 'dosage', 'start_date', 'end_date', 'instructions'];
}
