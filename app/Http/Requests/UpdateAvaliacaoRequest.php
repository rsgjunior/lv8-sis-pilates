<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAvaliacaoRequest extends FormRequest
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
            'peso'                      => 'required|numeric',
            'altura'                    => 'required|numeric',
            'atividade_fisica'          => 'required|string',
            'objetivo'                  => 'required|string',
            'conhece_ou_praticou'       => 'required|numeric|between:0,1',
            'medicamentos'              => 'required|string',
            'queixa_principal'          => 'required|string',
            'historia_medica_atual'     => 'required|string',
            'fatores_que_pioram'        => 'required|string',
            'historia_medica_passada'   => 'required|string',
            'fatores_que_melhoram'      => 'required|string',
            'observacao'                => 'nullable|string',
        ];
    }
}
