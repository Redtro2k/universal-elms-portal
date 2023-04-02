<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use App\Http\Traits\{UserProfileValidation, InputModified};
use Carbon\Carbon;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules, UserProfileValidation, InputModified;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'firstname' => $this->stringRules(),
            'middlename' => $this->stringRules(false),
            'lastname' => $this->stringRules(),
            'userid' => ['required', 'numeric', 'unique:users'],
            'gender' => $this->stringRules(max: 15),
            'location' => $this->stringRules(),
            'contact_number' => $this->stringRules(),
            'emergency_contact' => $this->stringRules(),
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'date_of_birth' => ['required', 'date', 'before_or_equal:today', 'after_or_equal:'.now()->subYears(120)->format('Y-m-d')],
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();
        return User::create([
            'firstname' => $input['firstname'],
            'middlename' => $input['middlename'],
            'lastname' => $input['lastname'],
            'userid' => $input['userid'],
            'gender' => $input['gender'],
            'contact_number' => $input['contact_number'],
            'emergency_contact_number' => $input['emergency_contact'],
            'date_of_birth' => $this->dateModified($input['date_of_birth']),
            'location' => $input['location'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
