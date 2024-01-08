<?php

namespace App\Http\Controllers;

use App\Models\AsignaturaDocente;
use App\Models\OrganizacionAcademica;
use Illuminate\Http\Request;

class ReporteAcademiaController extends Controller
{
    public function index()
    {
        $datos['academia'] = AsignaturaDocente::query()
        ->get();
        return response()->json($datos);
      }

      public function busqueda()
      {
       return view('organizacionacademica.reportes');
      } 
}
