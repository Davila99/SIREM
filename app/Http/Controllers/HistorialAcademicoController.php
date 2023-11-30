<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HistorialAcademicoController extends Controller
{
    public function index(Estudiante $estudiante)
    {
        $dataEstudiante = $estudiante->load('calificaciones.cabecera.grupo.grado');
        $estudiante->load(
            'calificaciones.cabecera.grupo',
            'calificaciones.cabecera.asignatura'
        );

        $data = $estudiante->calificaciones
            ->groupBy('cabecera.grupo.grado_id')
            ->map(function ($grupo) {
                return $grupo
                    ->groupBy('cabecera.asignatura_id')
                    ->map(function ($notasAsignatura) {
                        return [
                            'asignatura' => $notasAsignatura->first()->cabecera
                                ->asignatura->descripcion,
                            'nf' => $notasAsignatura->avg('calificacion'),
                        ];
                    });
            });
          // return response()->json($dataEstudiante);    
        // return View(
        //     'estudiante.historialAcademico',
        //     compact('data', 'dataEstudiante')
        // );
        $pdf = Pdf::loadView('reportes.historialAcademicoPdf', compact('data', 'dataEstudiante'))->setPaper('letter');

        return $pdf->stream('reportes.historialAcademicoPdf',['Attachment'=> true]);
    }

    public function descargarActa()
    {
        return 'en desarrollo';
    }
}
