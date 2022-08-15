<?php

namespace App\Http\Requests\User;

use App\Rules\ValidateEmailUnique;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'min:2', 'regex:/^[a-zA-Z]+$/u'],
            'email' => ['required', 'email', 'not_regex:/^[root]/', new ValidateEmailUnique()],
            'password' => ['required', 'string', 'min:8', 'regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/', 'required_with:password_confirm', 'same:password_confirm'],
            'password_confirm' => ['required'],
            'social_type' => ['numeric'],
            'role_ids' =>['required'],
        ];
    }
}
