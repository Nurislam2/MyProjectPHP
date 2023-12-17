<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PatientsDiagnosesMedicaments;

class medicament extends Model
{
    use HasFactory;
    public function patientsDiagnosesMedicaments()
    {
        return $this->hasMany(PatientsDiagnosesMedicaments::class, 'medicaments_id');
    }
}
