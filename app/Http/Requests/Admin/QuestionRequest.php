<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class QuestionRequest extends FormRequest
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
            'content' => ['required',Rule::unique('questions')->ignore($this->question)],
            'category_id' => ['required'],
            'answer' => ['required','array'],
            'radio-answer' => ['required','in:0,1,2,3'],
        ];
    }
}
