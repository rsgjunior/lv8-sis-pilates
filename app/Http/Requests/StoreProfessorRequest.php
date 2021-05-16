<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProfessorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome'                  => 'required|string|max:200',
            'email'                 => 'required|email|max:120',
            'telefone'              => 'required|min:8|max:25',
            'telefone2'             => 'nullable|min:8|max:25',
            'data_nascimento'       => 'required|before_or_equal:today',
            'profissao'             => 'required|numeric|between:1,3',
            'registro_profissional' => 'required|string',
            'sexo'                  => 'required|max:20',
            'cep'                   => 'required|numeric',
            'endereco_rua'          => 'required|string',
            'endereco_numero'       => 'required|numeric',
            'endereco_complemento'  => 'nullable|string',
            'endereco_estado'       => 'required|string',
            'endereco_cidade'       => 'required|string',
            'endereco_bairro'       => 'required|string',
            'cpf'                   => 'required|numeric|digits:11',
            'foto'                  => 'nullable|mimes:jpg,bmp,png'
        ];
    }
}
