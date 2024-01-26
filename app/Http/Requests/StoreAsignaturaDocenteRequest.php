<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAsignaturaDocenteRequest extends FormRequest
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
            'organizacion_academica_id' => 'required',
            'asignatura_id' => 'required',
            'empleado_id' => 'required',
            'grupo_id' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'organizacion_academica_id.required' =>
            'Organización Academica es obligatorio.',
            'asignatura_id.required' => 'La asignatura es obligatorio.',
            'empleado_id.required' => 'El empleado es obligatorio.',
            'grupo_id.required' => 'El grupo es obligatorio.',
        ];
    }
}
