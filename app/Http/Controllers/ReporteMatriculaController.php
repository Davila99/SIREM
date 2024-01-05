<?php

namespace App\Http\Controllers;

use App\Http\Exportables\ExcelReporteMatricula;
use App\Models\Matricula;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ReporteMatriculaController extends Controller
{
    public function getData()
    {
        $datos['matriculas'] = Matricula::query()
            ->leftJoin(
                'estudiantes',
                'matriculas.estudiante_id',
                '=',
                'estudiantes.id'
            )
            ->select('matriculas.fecha as FechaMatricula')
            ->selectRaw(
                '
        CASE
            WHEN matriculas.partida_nacimiento IS NULL THEN "No"
            ELSE "Si"
        END as PartidaNacimiento
            '
            )
            ->selectRaw(
                '
          CASE
             WHEN matriculas.tarjeta_vacuna IS NULL THEN "No"
            ELSE "Si"
          END as TarjetaVacuna
            '
            )
            ->selectRaw(
                '
          CASE
             WHEN matriculas.diploma_prescolar IS NULL THEN "No"
            ELSE "Si"
          END as DiplomaPrescolar
            '
            )
            ->selectRaw(
                '
          CASE
             WHEN matriculas.cedula_padres IS NULL THEN "No"
            ELSE "Si"
          END as CedulaPadres
            '
            )
            ->selectRaw(
                '
          CASE
             WHEN matriculas.hoja_traslado IS NULL THEN "No"
            ELSE "Si"
          END as HojaTraslado
            '
            )
            ->selectRaw(
                '
          CASE
             WHEN matriculas.hoja_traslado IS NULL THEN "No"
            ELSE "Si"
          END as HojaTraslado
            '
            )
            ->selectRaw(
                '
          CASE
             WHEN matriculas.diploma_secundaria IS NULL THEN "No"
            ELSE "Si"
          END as DiplomaSecundaria
            '
            )

            ->selectRaw(
                '
        CASE
            WHEN estudiantes.nombres IS NULL THEN "No definidio"
            ELSE estudiantes.nombres
        END as Nombres
    '
            )
            ->selectRaw(
                '
        CASE
            WHEN estudiantes.apellidos IS NULL THEN "No definidio"
            ELSE estudiantes.apellidos
        END as Apellidos
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
        END as Direccion
    '
            )
            ->selectRaw(
                '
        CASE
            WHEN estudiantes.sexo_id IS NULL THEN "No definidio"
            ELSE estudiantes.sexo_id
        END as Sexo
    '
            )
            ->leftJoin('grupos', 'matriculas.grupo_id', '=', 'grupos.id')
            ->leftJoin('grados', 'grupos.grado_id', '=', 'grados.id')
            ->selectRaw(
                '
        CASE
            WHEN grupos.grado_id IS NULL THEN "No definido"
            ELSE grados.descripcion
        END as Grado'
            )
            ->leftJoin('seccions', 'grupos.seccion_id', '=', 'seccions.id')
            ->selectRaw(
                '
        CASE
            WHEN grupos.seccion_id IS NULL THEN "No definido"
            ELSE seccions.descripcion
        END as Seccion'
            )
            ->leftJoin('turnos', 'grupos.turno_id', '=', 'turnos.id')
            ->selectRaw(
                '
        CASE
            WHEN grupos.turno_id IS NULL THEN "No definido"
            ELSE turnos.descripcion
        END as Turno'
            )

            ->get();
        return $datos;
    }
    public function index()
    {
        $datos = $this->getData();
        return response()->json($datos);
    }

    public function exportMatricula()
    {
        return Excel::download(new ExcelReporteMatricula(), 'matriculas.xlsx');
    }
}
