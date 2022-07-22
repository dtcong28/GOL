<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Session;

class ValidateEmailUnique implements Rule
{
    public function passes($attribute, $value)
    {
        $users = collect(Session::get('users'));

        return empty($users->firstWhere('email', $value));
    }

    public function message()
    {
        return 'The :attribute already exists.';
    }
}
