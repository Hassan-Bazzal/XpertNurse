<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorVisit extends Model
{
    use HasFactory;
     public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }
    protected $table = 'doctor_visits';
    
    protected $fillable = [
        'patient_id',
        'doctor_id',
        'visit_date',
        'reason_for_visit',
        'diagnosis',
        'treatment_plan',
    ];
}
