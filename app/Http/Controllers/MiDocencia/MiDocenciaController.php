<?php

namespace App\Http\Controllers\MiDocencia;

use App\Models\AsignaturaDocente;

class MiDocenciaController
{

    public function index()
    {
        $cursos = AsignaturaDocente::query()
            ->with(['asignatura'])
            ->where('empleado_id', auth()->id())->get();

        return view('calificaciones.index', ['cursos' => $cursos]);
    }
}
