<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DefinirPresencasRequest extends FormRequest
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
            'alunos' => 'required|array',
            'alunos.*' => 'required|array:id,presente,motivo_falta',
            'alunos.*.id' => 'required|numeric',
            'alunos.*.motivo_falta' => 'nullable|string',
            'alunos.*.presente' => ['required', Rule::in([1, 2])]
        ];
    }
}
