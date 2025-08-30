<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
   public function vitals()
    {
        return $this->hasMany(Vital::class);
    }

    public function doctorVisits()
    {
        return $this->hasMany(DoctorVisit::class);
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    public function clinicalNotes()
    {
        return $this->hasMany(ClinicalNote::class);
    }

    public function medicines()
    {
        return $this->belongsToMany(Medicine::class, 'patient_medicines')
                    ->withPivot('dosage', 'start_date', 'end_date')
                    ->withTimestamps();
    }
    protected $table = 'patients';
    protected $fillable = [
        'first_name',
        'last_name',
        'gender',
        'address',
        'email',
        'contact_number',
        'date_of_birth',
        'emergency_contact_name',
        'emergency_contact_number',

    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
