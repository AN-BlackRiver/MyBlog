<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'title' => ['required','string'],
            'content' => ['required','string'],
            'preview_image' => ['required','file'],
            'main_image' => ['required','file'],
            'category_id' => ['required','integer','exists:categories,id'],
            'tag_ids' => ['nullable','array'],
            'tag_ids.*' => ['nullable','integer','exists:tags,id'],
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Необходимо заполнить заголовок',
            'title.string' => 'Данные должны соответствовать строчному типу',
            'content.required' => 'Необходимо заполнить содержание',
            'content.string' => 'Данные должны соответствовать строчному типу',
            'preview_image.required' => 'Необходимо выбрать изображение',
            'preview_image.file' => 'Необходимо выбрать изображение',
            'main_image.required' => 'Необходимо выбрать изображение',
            'main_image.file' => 'Необходимо выбрать изображение',
            'category_id.required' => 'Необходимо выбрать категорию',
            'category_id.integer' => 'Данная категория отсутствует',
            'category_id.exists' => 'Данная категория отсутствует',
            'tag_ids.array' => 'Данный тэг отсутствует',
        ];
    }
}
