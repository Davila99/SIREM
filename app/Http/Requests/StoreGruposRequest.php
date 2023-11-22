<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGruposRequest extends FormRequest
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
            'empleado_id' => 'required',
            'grado_id' => 'required',
            'seccion_id' => 'required',
            'turno_id' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'empleado_id.required' => 'El campo Docente es obligatorio',
            'grado_id.required' => 'El campo Grado es obligatorio',
            'seccion_id.required' => 'El campo Seccion es obligatorio',
            'turno_id.required' => 'El campo Turno es obligatorio',
        ];
    }
}
