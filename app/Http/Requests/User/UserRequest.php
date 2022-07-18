<?php

namespace App\Http\Requests\User;

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
            'name' => ['required','min:2', 'regex:/^[a-zA-Z]+$/u'],
            'email' => ['required','email'],
            'password' => ['required','string','min:8','regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/','required_with:password_confirm','same:password_confirm'],
            'password_confirm' =>['required'],
            'facebook' => ['url'],
            'youtube' => ['url']
        ];
    }
    
    public function messages()
    {
        return [
            'name.required' => ':attribute bắt buộc phải nhập'
        ];
    }

    public function attributes() {
        return [
            'name' => 'Tên người dùng'
        ];
    }

}
