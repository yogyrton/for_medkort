<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => 'required|email|exists:users',
            'password' => 'required|min:3|max:10',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Обязательно для заполнения',
            'email.email' => 'Должно быть email',
            'email.exists' => 'Такой email не зарегистрирован',

            'password.required' => 'Обязательно для заполнения',
            'password.min' => 'Минимум 3 символа',
            'password.max' => 'Максимум 10 символов',
        ];
    }
}
