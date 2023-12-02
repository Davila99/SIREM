<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;

class BuscadorEstudiante extends Controller
{
    public function index()
    {
        $datos['estudiantes'] = Estudiante::query()
            //->with(['tutor'])
            //->with(['sexo'])
            ->leftJoin('sexos', 'estudiantes.sexo_id', '=', 'sexos.id')
            ->select('estudiantes.*')
            ->selectRaw('
                CASE
                    WHEN sexos.descripcion IS NULL THEN "No definidio"
                    ELSE sexos.descripcion
                END as sexo
            ')
            ->get();
        // ->paginate(10);


        return response()->json($datos);

    }
}
