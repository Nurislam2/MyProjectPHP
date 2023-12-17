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

Route::group(['middleware' => 'auth'], function() {
    Route::group(['middleware' => 'role:patient', 'prefix' => 'patient', 'as' => 'patient.'], function() {
        Route::resource('info', \App\Http\Controllers\Patient\InfoController::class);
        Route::resource('medicaments', \App\Http\Controllers\Patient\Medicamentcontroller::class);
    });
   Route::group(['middleware' => 'role:doctor', 'prefix' => 'doctor', 'as' => 'doctor.'], function() {
       Route::resource('patients', \App\Http\Controllers\Doctor\PatientsController::class);
    Route::get('patients/{patient}/addmedic', [YourControllerName::class, 'addMedic'])->name('patients.addmedic');

   });
    Route::group(['middleware' => 'role:admin', 'prefix' => 'admin', 'as' => 'admin.'], function() {
        Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
    });
});
// *
// 210.541241025