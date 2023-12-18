<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Patient;
use App\Models\Doctor;

use App\Models\PatientsDiagnosesMedicaments;
use Illuminate\Support\Facades\Auth;
class InfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index()

    {
        // $user = Auth::user();

        // // Получаем связанного с ним пациента
        // $patient = $user->patient;
        //

        // // Получаем данные, связанные с пациентом
        // $Medi = $patient->patientsDiagnosesMedicaments;

        $user = Auth::user();
        $patient=Patient::where('user_id',$user->id)->first();
        $Medi = PatientsDiagnosesMedicaments::where('patients_id', $patient->id)->get();

        return view('patient.info.index',compact('Medi'));
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
    public function showapintment()
    {
        $doctors= Doctor::all();
        return view('patient.info.show',compact('doctors'));

    }

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
