<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\medicament;
use App\Models\Diagnoses;
class PatientsDiagnosesMedicaments extends Model
{
    use HasFactory;
      protected $fillable = [
        'patients_id',
        'diagnoses_id',
        'medicaments_id',
    ];
    // public function diagnoses_id()
    public function diagnoses()
    {
        return $this->belongsTo(Diagnoses::class, 'diagnoses_id');
    }

    public function medicaments()
    {
        return $this->belongsTo(medicament::class, 'medicaments_id');
    }
}
