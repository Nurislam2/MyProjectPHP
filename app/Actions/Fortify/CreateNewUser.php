<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\Patient;
use App\Models\Doctor;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        $user = User::create([
        'name' => $input['name'],
        'email' => $input['email'],
        'role_id' => $input['role_id'],
        'password' => Hash::make($input['password']),
        'patient_address' => $input['patient_address'] ?? null,
        'patient_licence_number' => $input['patient_licence_number'] ?? null,
        'doctor_qualifications' => $input['doctor_qualifications'] ?? null,
    ]);
        $user_id = $user->id;

    // Создание пациента с тем же именем

  if ($input['role_id'] == 2) {
        // Роль 1 - Пациент
        Patient::create([
            'user_id' => $user_id,
            'gender_id' => $input['gender_id'],
            // Другие поля пациента, если они есть
        ]);
    } elseif ($input['role_id'] == 3) {
        // Роль 2 - Доктор
        Doctor::create([
            'user_id' => $user_id,
            'gender_id' => $input['gender_id'],
            'phone'=>$input['phone'],
            'specilizations_id'=>1,
            // Другие поля доктора, если они есть
        ]);
    }

        return $user;


    }
}
