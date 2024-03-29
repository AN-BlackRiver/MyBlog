<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required','string'],
            'content' => ['required','string'],
            'preview_image' => ['nullable','file'],
            'main_image' => ['nullable','file'],
            'category_id' => ['nullable','integer','exists:categories,id'],
            'tag_ids' => ['nullable','array'],
            'tag_ids.*' => ['nullable','integer','exists:tags,id'],
        ];


    }

    public function messages()
    {
        return [
            'title.required' => 'Необходимо заполнить это поле',
            'title.string' => 'Данные должны соответствовать строчному типу',
            'preview_image.file' => 'Данные выбрать изображение',
            'main_image.file' => 'Необходимо выбрать изображение',
            'category_id.integer' => 'Данная категория отсутствует',
            'category_id.exists' => 'Данная категория отсутствует',
            'tag_ids.array' => 'Данный тэг отсутствует',
        ];
    }
}
