<?php

namespace App\Http\Requests;

use App\Models\Post;
use Illuminate\Foundation\Http\FormRequest;

class PostStoreRequest extends FormRequest
{
   
    public function authorize()
    {
        return $this->user()->can('create',Post::class);
    }

    public function rules()
    {
        return [
            'title'       => ['required'],
            'description' => ['required']
        ];
    }

    public function messages()
    {
        return [
            'title.required'       => 'O campo Título é obrigatório',
            'description.required' => 'O campo Descrição é obrigatório'
        ];
    }

}
