<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function assignedUser()
    {
        return $this->belongsTo(User::class, 'assigned_user_id');
    }
    
            protected $fillable = [
                'patient_id',
                'assigned_user_id',
                'appointment_date',
                'appointment_time',
                'type',
                'notes',
            ];

}
