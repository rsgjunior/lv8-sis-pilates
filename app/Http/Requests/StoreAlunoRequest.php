<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAlunoRequest extends FormRequest
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
            'email'                 => 'nullable|email|max:120',
            'telefone'              => 'required|min:8|max:25',
            'telefone2'             => 'nullable|min:8|max:25',
            'data_nascimento'       => 'nullable|before_or_equal:today',
            'profissao'             => 'nullable|string|max:45',
            'sexo'                  => 'nullable|max:20',
            'cep'                   => 'nullable|numeric',
            'endereco_rua'          => 'nullable|string',
            'endereco_numero'       => 'nullable|numeric',
            'endereco_complemento'  => 'nullable|string',
            'endereco_estado'       => 'nullable|string',
            'endereco_cidade'       => 'nullable|string',
            'endereco_bairro'       => 'nullable|string',
            'rg'                    => 'nullable|numeric|digits_between:5,14',
            'cpf'                   => 'nullable|numeric|digits:11',
            'foto'                  => 'nullable'
        ];
    }
}
