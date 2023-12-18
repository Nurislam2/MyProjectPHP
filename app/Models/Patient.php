<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
     protected $fillable = [
        'name',
        'user_id',
        'gender_id'
    ];
    public function patientsDiagnosesMedicaments()
    {
        return $this->hasMany(PatientsDiagnosesMedicaments::class, 'patient_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
     public function gender()
    {
        return $this->belongsTo(Gender::class, 'gender_id');
    }
}
