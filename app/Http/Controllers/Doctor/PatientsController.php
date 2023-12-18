<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Diagnoses;
use App\Models\medicament;
use Illuminate\Support\Facades\Auth;

use App\Models\PatientsDiagnosesMedicaments;
class PatientsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patients=Patient::all();

        return view('doctor.patients.index',compact('patients'));
    }

     public function addmedic($patientId)
    {
        $patients = Patient::findOrFail($patientId);
        $medicament=medicament::all();
        $diagnoses=Diagnoses::all();
        return view('doctor.patients.addmedicdiagnos',compact('patients','medicament','diagnoses'));
    }
     public function addmedicс(Request $request, $patientId)
    {
        // $request->validate([
        //     'medicaments' => 'required|array',
        //     'diagnoses' => 'required|array',
        // ]);

        $patient = Patient::findOrFail($patientId);

         PatientsDiagnosesMedicaments::create([
                    'patients_id' => $patient->id,
                    'medicaments_id' => $request->input('medicaments'),
                    'diagnoses_id' => $request->input('diagnoses'),
                                    ]);
          return redirect()->route('doctor.patients.patientinfo', $patient->id)
            ->with('success', 'Medicaments and diagnoses added successfully');

    }
    public function patientinfo($patientId)
    {
        $patient = Patient::findOrFail($patientId);
        // $user = Auth::user();
        // $patient=Patient::where('user_id',$user->id)->first();
        $Medi = PatientsDiagnosesMedicaments::where('patients_id', $patient->id)->get();

        return view('doctor.patients.patientinfo',compact('patient','Medi'));
    }

    // /**
    //  * Show the form for creating a new resource.
    //  */
    // public function create()
    // {
    //     //
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  */
    // public function store(Request $request)
    // {
    //     //
    // }

    // /**
    //  * Display the specified resource.
    //  */
    // public function show(string $id)
    // {
    //     //
    // }

    // *
    //  * Show the form for editing the specified resource.

    // public function edit(string $id)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, string $id)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(string $id)
    // {
    //     //
    // }
}
