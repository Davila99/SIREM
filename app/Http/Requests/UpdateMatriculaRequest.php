<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMatriculaRequest extends FormRequest
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
            'tipo_matricula_id' => 'required',
            'grupo_id' => 'required',
            'partida_nacimiento' => 'nullable',
            'tarjeta_vacuna' => 'nullable',
            'diploma_prescolar' => 'nullable',
            'cedula_padres' => 'nullable',
            'hoja_traslado' => 'nullable',
            'diploma_secundaria' => 'nullable',
        ];
    }
    public function messages()
    {
        return [
            'tipo_matricula_id.required' => 'El campo tipo de matricula es requerido',
            'grupo_id.required' => 'El campo grupo es requerido',
        ];
    }
}
