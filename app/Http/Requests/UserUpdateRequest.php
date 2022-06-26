<?php

namespace App\Http\Requests;

use App\User;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome' => [
                'required', 'min:3'
            ],
            'email' => [
                'required', 'email', Rule::unique((new User)->getTable())->ignore($this->route()->user->id ?? null)
            ],
            'perfil_id' => [
                'required', 'notin:0'
            ]
        ];
    }

    public function messages()
    {
        return [
            "nome.required" => "Por favor insira um nome!",
            "title.min" => "O nome precisa ter mais de 3 caracteres!",
            "email.required" => "Por favor insira um email",
            "email.email" => "Por favor insira um email válido",
            "perfil.required" => "Selecione um perfil de usuário",
            "perfil.notin" => "Selecione um perfil de usuário",
        ];
    }
}
