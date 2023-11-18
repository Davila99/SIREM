<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActaCalificacionFinalRequest;
use App\Models\CalificacionDetalle;
use App\Models\Calificaciones;
use Illuminate\Http\Request;

class ActaCalificacionFinalController extends Controller
{

    public function getData($asignaturaId, $grupoId)
    {
        $calificaciones = CalificacionDetalle::query()
            ->whereHas('cabecera', function ($query) use ($asignaturaId, $grupoId) {
                $query
                    ->where('asignatura_id', $asignaturaId)
                    ->where('grupo_id', $grupoId);
            })
            ->with(['estudiante'])
            ->get();


        $calificacionesNF = $calificaciones->groupBy('estudiante_id')
            ->map(function ($item) {
                $item->each(function ($i) use ($item) {
                    $i->nf = $item->sum('calificacion') / $item->count();
                });
                return $item;
            });

        return $calificacionesNF;

    }

    public function index(ActaCalificacionFinalRequest $request)
    {
        $data = $this->getData($request->asignatura_id, $request->grupo_id);

        return $data;
    }
}
