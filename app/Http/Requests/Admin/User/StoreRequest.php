<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'name' => ['required','string'],
            'email' => ['required','string','email','unique:users'],
            'role' => ['required','integer'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Необходимо заполнить имя пользователя',
            'email.required' => 'Необходимо заполнить Email',
            'email.unique' => 'Данный Email уже зарегистрирован',
            'role.required' => 'Выберите роль пользователя',
        ];
    }
}
