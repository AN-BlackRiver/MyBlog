<?php

namespace App\Http\Requests\Admin\User;

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
            'name' => ['required','string'],
            'email' => ['required','string','email','unique:users,email,'.$this->user->id],
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
