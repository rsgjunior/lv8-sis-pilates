<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateExperimentalRequest extends FormRequest
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
            'data' => 'nullable|date|after_or_equal:today',
            'horario_inicio' => 'nullable|date_format:H:i',
            'horario_fim' => 'nullable|date_format:H:i|after:horario_inicio',
            'observacao' => 'nullable|string|max:500',
            'status' => ['nullable', Rule::in([0, 1, 2, 3])],
            'feedback' => 'nullable|string|max:500',
            'cor_calendario' => 'nullable|string|size:7'
        ];
    }
}
