<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreHorarioTurmaRequest extends FormRequest
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
            'dias_da_semana'     => 'required',
            'horario_inicio'    => 'required|date_format:H:i',
            'horario_fim'       => 'required|date_format:H:i|after:horario_inicio'
        ];
    }
}
