<?php

namespace App\Http\Controllers;

use App\Exports\CalificacionesExport;
use App\Models\Calificaciones;
use Illuminate\Http\Request;
use App\Models\AsignaturaDocente;
use App\Models\CalificacionDetalle;
use App\Models\Cortes_evaluativo;
use App\Models\Matricula;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class CalificacionesController extends Controller
{
    private $rules = [
        'fecha' => 'required | date',
        'empleado_id' => 'required | numeric',
        'asignatura_id' => 'required | numeric',
        'observaciones' => 'nullable | string | max:255',
        'corte' => 'required | numeric',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDocente()
    {
        $docente = Auth::user()->empleado;
        return $docente;
    }
    public function getEstudiantes($id)
    {
        return Matricula::query()
            ->with(['estudiante'])
            ->where('grupo_id', $id)
            ->get()
            ->pluck('estudiante');
    }

    public function generarActa(
        $grupoId,
        $asignaturaId,
        $corteId,
        Request $request
    ) {
        $acta = Calificaciones::query()
            ->where('asignatura_id', $asignaturaId)
            ->where('corte_evaluativo_id', $corteId)
            ->where('grupo_id', $grupoId)
            ->first();

        if ($acta) {
            $acta->load('calificaciones.estudiante');
            $filas = $acta->calificaciones;

            return view('calificaciones.show', compact('acta', 'filas'));
        }

        $docente = $this->getDocente();
        $estudiantes = $this->getEstudiantes($grupoId);

        $acta = $this->alamacenarActa($grupoId, $docente, $corteId);
        $filas = $this->setActaRows($acta, $estudiantes);

        return view('calificaciones.show', compact('acta', 'filas'));
    }


    public function alamacenarActa($id, $docente, $corte)
    {
        $acta = new Calificaciones();
        $acta->fecha = date('Y-m-d');
        $acta->empleado_id = $docente->id;
        $acta->asignatura_id = $id;
        $acta->observaciones = 'Acta de calificaciones del corte ' . $corte;
        $acta->corte_evaluativo_id = $corte;
        $acta->grupo_id = $id;
        $acta->save();
        return $acta;
    }
    public function setActaRows(Calificaciones $acta, $estudiantes)
    {
        foreach ($estudiantes as $estudiante) {
            $actaRow = new CalificacionDetalle();
            $actaRow->calificacion_id = $acta->id;
            $actaRow->estudiante_id = $estudiante->id;
            $actaRow->calificacion = 0;
            $actaRow->corte_evaluativo_id = $acta->corte_evaluativo_id;
            $actaRow->save();
        }
        $filas = CalificacionDetalle::query()
            ->where('calificacion_id', '=', $acta->id)
            ->get();
        return $filas;
    }

    public function changeNota(Request $request)
    {
        $calificacion = CalificacionDetalle::query()
            ->where('id', $request->id)
            ->first();

        if ($calificacion) {
            $calificacion->calificacion = $request->calificacion;
            $calificacion->save();

            return redirect()->back()->with('mensaje-nota', 'ok');
        } else {
            return response()->json([
                'message' => 'No se encontró el detalle de calificación',
            ], 404);
        }
    }

    public function imprimirActa(Request $request)
    {

        $acta = Calificaciones::findOrFail($request->actaId)
            ->first();
        if ($acta) {
            $filas = CalificacionDetalle::query()
                ->where('calificacion_id', '=', $acta->id)
                ->get();
            $acta->load('calificaciones.estudiante');
            try {
                $pdf = PDF::loadView('calificaciones.reporte', compact('acta', 'filas'));
                return $pdf->stream('acta.pdf');
            } catch (\Throwable $th) {
                return redirect()->back()->with('mensaje-error', 'ok');
            }
        }

    }

    public function index()
    {
        $cursos = AsignaturaDocente::query()
            ->with(['asignatura'])
            ->with(['grupo'])
            ->where('empleado_id', auth()->id())
            ->get();
        $cortes = Cortes_evaluativo::all();
        if ($cursos->isEmpty()) {
            return view('calificaciones.mensaje')->with('mensaje', 'ok');

        } else {
            return view('calificaciones.index', compact('cursos', 'cortes'));
        }


    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCalificacionesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Calificaciones  $calificaciones
     * @return \Illuminate\Http\Response
     */
    public function show(Calificaciones $calificaciones)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Calificaciones  $calificaciones
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCalificacionesRequest  $request
     * @param  \App\Models\Calificaciones  $calificaciones
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Calificaciones  $calificaciones
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
}
