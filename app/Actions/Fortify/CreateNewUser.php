<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use App\Http\Traits\UserProfileValidation;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules, UserProfileValidation;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'firstname' => $this->stringRules(),
            'middlename' => $this->stringRules(),
            'lastname' => $this->stringRules(),
            'userid' => $this->numberRules(max: 12, unique: 'users'),
            'gender' => $this->stringRules(max: 15),
            'contact_number' => $this->numberRules(unique: 'users'),
            'emergency_contact_number' => $this->numberRules(),
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'birth_date' => ['required', 'date', 'before_or_equal:today', 'after_or_equal:'.now()->subYears(120)->format('Y-m-d')],
            'location' => $this->stringRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();
        // 'location',
        // 'email',
        // 'password',

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
