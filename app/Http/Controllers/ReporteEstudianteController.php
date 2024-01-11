<?php

namespace App\Http\Controllers;

use App\Http\Exportables\ExcelReporteEstudiante;
use App\Models\Estudiante;
use Maatwebsite\Excel\Facades\Excel;

class ReporteEstudianteController extends Controller
{
    public function getData()
    {
        $datos['estudiantes'] = Estudiante::query()
        ->leftJoin('matriculas', 'estudiantes.id', '=', 'matriculas.estudiante_id')
        ->selectRaw(
            '
      CASE
      WHEN matriculas.fecha IS NULL THEN "Estudiante No Matriculado"
      ELSE matriculas.fecha 
     END as EstudianteMatriculado
     '
        )
            ->selectRaw(
                '
         CASE
         WHEN estudiantes.nombres IS NULL THEN "No definidio"
         ELSE CONCAT(estudiantes.nombres , " ", estudiantes.apellidos ) 
         END as Estudiante
         '
            )
            ->selectRaw(
                '
     CASE
     WHEN estudiantes.codigo_estudiante IS NULL THEN "No definidio"
     ELSE estudiantes.codigo_estudiante
     END as CodigoEstudiante
     '
            )
            ->selectRaw(
                '
     CASE
     WHEN estudiantes.fecha_nacimiento IS NULL THEN "No definidio"
    ELSE estudiantes.fecha_nacimiento
    END as FechaNacimiento
    '
            )
            ->selectRaw(
                '
    CASE
    WHEN estudiantes.direccion IS NULL THEN "No definidio"
    ELSE estudiantes.direccion
    END as Dirección
'
            )
            ->leftJoin(
                'tutores',
                'estudiantes.tutor_id',
                '=',
                'tutores.id'
            )
            ->selectRaw(
                '
         CASE
         WHEN tutores.nombre IS NULL THEN "No definidio"
         ELSE CONCAT(tutores.nombre, " ", tutores.apellido ) 
         END as Tutor
        '
            )
            ->selectRaw(
                '
         CASE
         WHEN tutores.cedula IS NULL THEN "No definidio"
         ELSE tutores.cedula
         END as CedulaTutor
        '
            )
            ->selectRaw(
                '
         CASE
         WHEN tutores.telefono IS NULL THEN "No definidio"
         ELSE tutores.telefono
         END as TelefonoTutor
        '
            )

            
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
    public function exportEstudiante()
    {
        return Excel::download(new ExcelReporteEstudiante(), 'estudiantes.xlsx');
    }
}
