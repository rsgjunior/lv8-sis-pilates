<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAvaliacaoRequest extends FormRequest
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
            'aluno_id'                  => 'required',
            'peso'                      => 'nullable|numeric',
            'altura'                    => 'nullable|numeric',
            'atividade_fisica'          => 'nullable|string',
            'objetivo'                  => 'nullable|string',
            'conhece_ou_praticou'       => 'nullable|string',
            'medicamentos'              => 'nullable|string',
            'queixa_principal'          => 'nullable|string',
            'historia_medica_atual'     => 'nullable|string',
            'fatores_que_pioram'        => 'nullable|string',
            'historia_medica_passada'   => 'nullable|string',
            'fatores_que_melhoram'      => 'nullable|string',
            'observacao'                => 'nullable|string',
            'exames'                    => 'nullable|array',
            'comentarios'               => 'nullable|array'
        ];
    }
}
