<?php

namespace App\Http\Controllers;

use App\Http\Exportables\ExcelReporteCalificaciones;
use App\Models\Calificaciones;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ReporteCalificacionesController extends Controller
{
    public function index()
    {
        $datos['calificaciones'] = Calificaciones::query()

            ->leftJoin('calificacion_detalles', 'calificaciones.id', '=', 'calificacion_detalles.calificacion_id')
            ->leftJoin('estudiantes', 'calificacion_detalles.id', '=', 'calificacion_detalles.estudiante_id')
            ->select('estudiantes.nombres as Estudiante')
            ->selectRaw(        '
           CASE
           WHEN estudiantes.nombre IS NULL THEN "No definidio"
           ELSE CONCAT(estudiantes.nombres, " ", estudiantes.apellidos ) 
           END as Estudiante
           '
            )
            ->select('calificacion_detalles.calificacion as Calificacion')
            ->selectRaw(        '
            calificacion_detalles.calificacion as Calificacion
            '
             )
            ->selectRaw(        '
            calificacion_detalles.calificacion_cualitativa as CalificacionCualitativa
            '
             )
            ->selectRaw(        '
            CASE
            WHEN calificacion_detalles.observaciones IS NULL THEN "No hay observaciones"
            ELSE calificacion_detalles.observaciones
            END as Observaciones
            '
             )
            ->leftJoin('grupos', 'calificaciones.grupo_id', '=', 'grupos.id')
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
            ->selectRaw(
                '
            CASE
            WHEN grupos.anio_lectivo IS NULL THEN "No definidio"
            ELSE grupos.anio_lectivo
            END as AnioLectivo
            '
            )
            ->leftJoin(
                'asignaturas',
                'calificaciones.asignatura_id',
                '=',
                'asignaturas.id'
            )
            ->selectRaw(
                '
        CASE
            WHEN asignaturas.descripcion IS NULL THEN "No definidio"
            ELSE asignaturas.descripcion
        END as Asignatura
    '
            )
            ->leftJoin(
                'cortes_evaluativos',
                'calificaciones.corte_evaluativo_id',
                '=',
                'cortes_evaluativos.id'
            )
            ->selectRaw(
                '
        CASE
            WHEN cortes_evaluativos.descripcion IS NULL THEN "No definidio"
            ELSE cortes_evaluativos.descripcion
        END as Corte
    '
            )
            ->get();
        return response()->json($datos);
    }
    public function busqueda()
    {
        return view('calificaciones.reportes');
    }
 
    public function exportCalificaciones()
    {
        return Excel::download(new ExcelReporteCalificaciones(), 'matriculas.xlsx');
    }
}
