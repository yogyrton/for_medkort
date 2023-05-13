<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'name' => 'required|min:3|max:100',
            'email' => 'required|email',
            'is_admin' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Обязательно для заполнения',
            'name.min' => 'Минимум 3 символа',
            'name.max' => 'Максимум 100 символов',

            'email.required' => 'Обязательно для заполнения',
            'email.email' => 'Должно быть email',

            'is_admin.required' => 'Обязательно для заполнения',
        ];
    }
}
