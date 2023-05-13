<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'text' => 'required|string|min:3|max:100'
        ];
    }

    public function messages()
    {
        return [
            'text.required' => 'Обязательно для заполнения',
            'text.string' => 'Должно быть строкой',
            'text.min' => 'Минимум 3 символа',
            'text.max' => 'Максимум 100 символов',

        ];
    }
}
