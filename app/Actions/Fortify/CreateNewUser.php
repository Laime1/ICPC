<?php

namespace App\Actions\Fortify;

use App\Models\User;
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
     * @param  array  $input
     * @return \App\Models\User
     */

     protected function messages()
{
    return [
        'password.required' => 'El campo de contraseña es obligatorio.',
        'password.string' => 'La contraseña debe ser una cadena de texto.',
        'password.min' => 'La contraseña debe tener al menos :min caracteres.',
        'password.mixed_case' => 'La contraseña debe contener letras tanto en mayúsculas como en minúsculas.',
        'password.numbers' => 'La contraseña debe contener al menos un número.',
        'password.symbols' => 'La contraseña puede contener caracteres especiales.',
        'password.uncompromised' => 'La contraseña no debe aparecer en listas de contraseñas comunes.',
        'password.confirmed' => 'La confirmación de la contraseña no coincide.',
    ];
}

public function create(array $input)
{
    Validator::make($input, [
        'rol' => ['required'],
        'name' => ['required', 'string', 'min:3', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8', 'max:20'],
        'phone' => ['required', 'numeric', 'digits_between:8,8'], // Corregido a 'numeric' y 'digits_between'
        'last_name' => ['required', 'string','min:3', 'max:50'],
        'ci' => ['required', 'string', 'max:50', 'min:8'],
        'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
    ])->validate();

    return User::create([
        'name' => $input['name'],
        'email' => $input['email'],
        'password' => Hash::make($input['password']),
        'phone' => $input['phone'], // Cambiado a 'phone' si tu migración usa 'phone' en lugar de 'telefono'
        'rol' => $input['rol'],
        'ci' => $input['ci'],
        'last_name' => $input['last_name'],


    ]);
}

}
