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
            ->leftJoin(
                'organizacion_academicas',
                'asignatura_docentes.organizacion_academica_id',
                '=',
                'organizacion_academicas.id'
            )
            ->selectRaw(
                '
         CASE
         WHEN organizacion_academicas.descripcion IS NULL THEN "No definidio"
         ELSE organizacion_academicas.descripcion
         END as OrganizacionAcademica
'
            )
            ->selectRaw(
              '
        CASE
        WHEN organizacion_academicas.fecha IS NULL THEN "No definidio"
        ELSE organizacion_academicas.fecha
        END as Fecha
'
          )
          ->selectRaw(
            '
      CASE
      WHEN organizacion_academicas.confirmed IS NULL THEN "No Autorizado"
      ELSE "Autorizado"
      END as Autorizado
'
        )
        ->leftJoin(
            'asignaturas',
            'asignatura_docentes.asignatura_id',
            '=',
            'asignaturas.id'
        )
        ->selectRaw(
            '
      CASE
      WHEN asignaturas.descripcion IS NULL THEN "No Autorizado"
      ELSE asignaturas.descripcion
      END as Asignatura
'
        )
        ->leftJoin(
            'empleados',
            'asignatura_docentes.empleado_id',
            '=',
            'empleados.id'
        )
        ->selectRaw('
        CASE
            WHEN empleados.nombres IS NULL THEN "No Autorizado"
            ELSE CONCAT(empleados.nombres, " ", empleados.apellidos)
        END as Empleado
    ')
    ->leftJoin('grupos', 'asignatura_docentes.grupo_id', '=', 'grupos.id')
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
    
            ->get();
        return response()->json($datos);
    }

    public function busqueda()
    {
        return view('organizacionacademica.reportes');
    }
}
