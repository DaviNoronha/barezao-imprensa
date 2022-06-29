<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TimeRequest extends FormRequest
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
            'time' => [
                'required', 'min:3'
            ],
            'empresa' => [
                'required', 'min:2'
            ],
        ];
    }

    public function messages()
    {
        return [
            "time.required" => "Por favor insira um time!",
            "time.min" => "O nome do time precisa ter mais de 3 caracteres!",
            "empresa.required" => "Por favor insira uma empresa",
            "empresa.min" => "A empresa precisa ter mais de 3 caracteres",
        ];
    }
}
