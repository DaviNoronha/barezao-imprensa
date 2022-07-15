<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JogadorUpdateRequest extends FormRequest
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
            'numero' => [
                'required', 'max:3'
            ],
            'nome_camisa' => [
                'required', 'min:2'
            ],
            'cpf' => [
                'required'
            ],
            'tipo' => [
                'required'
            ],
            'funcao' => [
                'required'
            ],
            'time_id' => [
                'required', 'notin:0'
            ]
        ];
    }

    public function messages()
    {
        return [
            "nome.required" => "Por favor insira um nome!",
            "nome.min" => "O nome precisa ter mais de 3 caracteres!",
            "numero.required" => "Por favor insira um n° de camisa para o jogador!",
            "numero.max" => "O número não pode ter mais de 3 dígitos!",
            "nome_camisa.required" => "Por favor insira um nome para a camisa do jogador!",
            "nome_camisa.min" => "O nome na camisa precisa ter mais de 2 caracteres!",
            "cpf.required" => "Por favor insira um CPF, RG ou DRT para o jogador!",
            "tipo.required" => "Por favor informe o tipo do jogador",
            "funcao.required" => "Por favor informe a funcão do jogador",
            "time_id.required" => "Selecione um time para o jogador!",
            "time_id.notin" => "Selecione um time para o jogador!",
        ];
    }
}
