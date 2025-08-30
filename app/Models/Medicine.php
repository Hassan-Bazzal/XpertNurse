<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;
    public function patients()
    {
        return $this->belongsToMany(Patient::class, 'patient_medicines')
                    ->withPivot('dosage', 'start_date', 'end_date')
                    ->withTimestamps();
    }
    protected $table = 'medicines';
    protected $fillable = [
        'name',
        'description',
        'price',
        'quantity',
        'dosage_form',
        'strength',
        'manufacturer',
    ];
}
