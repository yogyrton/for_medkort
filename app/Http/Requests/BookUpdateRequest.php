<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookUpdateRequest extends FormRequest
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
            'title' => 'required|string|min:3|max:100',
            'author' => 'required|string|min:3|max:100',
            'description' => 'required|string|min:3|max:100',
            'category_id' => 'required',
            'cover' => 'file|max:10000',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Обязательно для заполнения',
            'title.string' => 'Должно быть строкой',
            'title.min' => 'Минимум 3 символа',
            'title.max' => 'Максимум 100 символов',

            'author.required' => 'Обязательно для заполнения',
            'author.string' => 'Должно быть строкой',
            'author.min' => 'Минимум 3 символа',
            'author.max' => 'Максимум 100 символов',

            'description.required' => 'Обязательно для заполнения',
            'description.string' => 'Должно быть строкой',
            'description.min' => 'Минимум 3 символа',
            'description.max' => 'Максимум 100 символов',

            'category_id.required' => 'Обязательно для заполнения, вначале создайте категорию',

            'cover.file' => 'Должен быть файлом',
            'cover.max' => 'Максимум 100 символов',
        ];
    }
}
