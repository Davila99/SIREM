<?php

namespace App\Http\Controllers;

use App\Models\Calificaciones;
use Illuminate\Http\Request;

class ReporteCalificacionesController extends Controller
{
    public function index()
    {
        $datos['calificaciones'] = Calificaciones::query()
            ->select('calificaciones.*')
            ->get();
        return response()->json($datos);
    }
    public function busqueda()
    {
        return view('calificaciones.reportes');
    }
}
