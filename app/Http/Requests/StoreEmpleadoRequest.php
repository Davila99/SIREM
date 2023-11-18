<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmpleadoRequest extends FormRequest
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
        $datenow = date('Y-m-d');
        return  [
            'nombres' => 'required|string|max:100',
            'apellidos' => 'required|string|max:100',
            'telefono' => 'required|string|max:12',
            'cedula' => 'required|string|max:16',
            'fecha_nacimiento' => 'required|date|before_or_equal:'. $datenow,
            'nivel_academico_id' => 'required',
            'direccion' => 'required|string|max:100',
            'email' => 'required',
            'fecha_ingreso' => 'required|date|before_or_equal:'. $datenow,
            'cargos_id' => 'required',
        ];
    }
}
