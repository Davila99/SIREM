<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;

class ReporteEstudianteController extends Controller
{
    public function getData()
    {
        $datos['estudiantes'] = Estudiante::query()
 
            ->selectRaw(
                '
         CASE
         WHEN estudiantes.nombres IS NULL THEN "No definidio"
         ELSE CONCAT(estudiantes.nombres , " ", estudiantes.apellidos ) 
         END as Estudiante
         ')
         ->selectRaw(
            '
     CASE
     WHEN estudiantes.codigo_estudiante IS NULL THEN "No definidio"
     ELSE estudiantes.codigo_estudiante
     END as CodigoEstudiante
     ')
     ->selectRaw(
        '
 CASE
 WHEN estudiantes.fecha_nacimiento IS NULL THEN "No definidio"
 ELSE estudiantes.fecha_nacimiento
 END as FechaNacimiento
 ')
 ->selectRaw(
    '
CASE
WHEN estudiantes.direccion IS NULL THEN "No definidio"
ELSE estudiantes.direccion
END as Dirección
')

       ->get();
        return $datos;
    }
                
    public function index()
    {
        $datos = $this->getData();
        return response()->json($datos);
    }


    public function busqueda()
    {
        return view('estudiante.reportes');
    }
}
