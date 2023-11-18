<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EstudianteRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $now = date('Y-m-d');
        return [
            'nombres' => 'required|string|max:100',
            'apellidos' => 'required|string|max:100',
            'fecha_nacimiento' => 'required|date|before_or_equal:' . $now,
            'direccion' => 'required|string|max:100',
            'tutor_id' => 'required',
            'sexo_id' => 'required',
        ];
    }
}
