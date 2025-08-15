<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClinicalNote extends Model
{
    use HasFactory;
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
    protected $table = 'clinical_notes';
}
