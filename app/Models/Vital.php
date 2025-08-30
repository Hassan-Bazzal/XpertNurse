<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vital extends Model
{
    use HasFactory;
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
    

 protected $fillable = [
                'patient_id',
                'blood_pressure',
                'heart_rate',
                'temperature',
                'respiratory_rate',
                'oxygen_saturation',
                'recorded_at',
            ];
}
