<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserStoreRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'     => ['required','min:3'],
            'email'    => ['required','email',Rule::unique('users')],
            'password' => ['required','min:6'],
            'role_id'  => ['required']
        ];
    }

    public function messages()
    {
        return [
            'name.required'     => 'O campo Nome é obrigatório',
            'name.min'          => 'O campo Nome deve conter pelo menos 3 caracteres',
            'email.required'    => 'O campo Email é obrigatório',
            'email.unique'      => 'Este Email já está sendo utilizado',
            'password.required' => 'O campo Senha é obrigatório',
            'password.min'      => 'O campo Senha deve conter pelo menos 6 caracteres',
            'role_id.required'  => 'O campo Função é obrigatório'
        ];
    }
}
