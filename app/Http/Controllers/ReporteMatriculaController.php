<?php

namespace App\Http\Controllers;

use App\Models\Matricula;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ReporteMatriculaController extends Controller
{
    public function index()
    {
        $datos['matriculas'] = Matricula::query()
            ->leftJoin(
                'estudiantes',
                'matriculas.estudiante_id',
                '=',
                'estudiantes.id'
            )
            // ->select('matriculas.*')
            ->select(
                'matriculas.fecha as FechaMatricula',
                'matriculas.partida_nacimiento as PartidaNacimiento',
                'matriculas.tarjeta_vacuna as TarjetaVacuna',
                'matriculas.diploma_prescolar as DiplomaPrescolar',
                'matriculas.cedula_padres as CedulaPadres',
                'matriculas.hoja_traslado as HojaTraslado',
                'matriculas.diploma_secundaria as DiplomaSecundaria'
            )
            
           ->selectRaw(
                '
            CASE
                WHEN estudiantes.nombres IS NULL THEN "No definidio"
                ELSE estudiantes.nombres
            END as nombre
        '
            )
            ->selectRaw(
                '
            CASE
                WHEN estudiantes.apellidos IS NULL THEN "No definidio"
                ELSE estudiantes.apellidos
            END as apellido
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
        return response()->json($datos);
    }
    public function exportMatricula()
    {
        return Excel::download(new Matricula(), 'matriculas.xlsx');
    }
}
