<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTutorRequest extends FormRequest
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
            'nombre' => 'required|string|max:100',
            'apellido' => 'required|string|max:100',
            'telefono' => 'required|string|max:12',
            'cedula' => 'required|string|max:16',
            'professions_id' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'nombre.required' => 'El campo nombre es requerido',
            'apellido.required' => 'El campo apellido es requerido',
            'telefono.required' => 'El campo telefono es requerido',
            'cedula.required' => 'El campo cedula es requerido',
            'professions_id.required' => 'El campo profesion es requerido',
        ];
    }
}
