<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PatientsDiagnosesMedicaments;
class Diagnoses extends Model
{
    use HasFactory;
    public function patientsDiagnosesMedicaments()
    {
        return $this->hasMany(PatientsDiagnosesMedicaments::class, 'diagnoses_id');
    }
}
