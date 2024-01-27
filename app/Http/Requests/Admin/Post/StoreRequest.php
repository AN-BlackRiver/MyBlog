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
            'preview_image' => ['file'],
            'main_image' => ['file'],
        ];
    }
}
