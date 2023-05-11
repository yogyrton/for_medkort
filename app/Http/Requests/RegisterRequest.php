<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required|string|min:3|max:100',
            'password' => 'required|min:3|max:10',
            'email' => 'required|email|unique:users',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Обязательно для заполнения',
            'name.string' => 'Должно быть строкой',
            'name.min' => 'Минимум 3 символа',
            'name.max' => 'Максимум 100 символов',

            'password.required' => 'Обязательно для заполнения',
            'password.min' => 'Минимум 3 символа',
            'password.max' => 'Максимум 10 символов',

            'email.required' => 'Обязательно для заполнения',
            'email.email' => 'Должно быть email',
            'email.unique' => 'Такой email уже есть',
        ];
    }
}
