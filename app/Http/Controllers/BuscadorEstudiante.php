<?php

namespace App\Http\Controllers;


use App\Models\Estudiante;
use Illuminate\Http\Request;
use App\Http\Resources\EstudianteCollection;



class BuscadorEstudiante extends Controller
{
    public function index()
    {
        $datos['estudiantes'] = Estudiante::query()
            ->with(['tutor'])
            ->with(['sexo'])
            ->paginate(10);
            return response()->json($datos);

    }
}
