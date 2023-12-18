<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
 Route::get('doctor/patients/patientinfo/{patient}', [\App\Http\Controllers\Doctor\PatientsController::class, 'patientinfo'])
    ->name('doctor.patients.patientinfo');
    Route::get('doctor/patients/addmedic/{patient}', [\App\Http\Controllers\Doctor\PatientsController::class, 'addmedic'])
    ->name('doctor.patients.addmedicament');
    Route::post('doctor/patients/addmedic/{patient}', [\App\Http\Controllers\Doctor\PatientsController::class, 'addmedicс'])
    ->name('doctor.patients.addmedic');

Route::get('patient/appointment', [\App\Http\Controllers\Patient\InfoController::class, 'showapintment'])
    ->name('patient.appointment');

Route::group(['middleware' => 'auth'], function() {
    Route::group(['middleware' => 'role:patient', 'prefix' => 'patient', 'as' => 'patient.'], function() {
        Route::resource('info', \App\Http\Controllers\Patient\InfoController::class);
    });
   Route::group(['middleware' => 'role:doctor', 'prefix' => 'doctor', 'as' => 'doctor.'], function() {

       Route::resource('patients', \App\Http\Controllers\Doctor\PatientsController::class);


   });
    Route::group(['middleware' => 'role:admin', 'prefix' => 'admin', 'as' => 'admin.'], function() {
        Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
    });
});

// Route::get('/','App\Http\Controllers\StripeController@index')->name('index');
 Route::post('/checkout','App\Http\Controllers\StripeController@checkout')->name('checkout');
 Route::get('/success','App\Http\Controllers\StripeController@success')->name('success');



// *
// 210.541241025