<?php

namespace App\Http\Controllers;

use App\Models\Calificaciones;
use Illuminate\Http\Request;
use App\Models\AsignaturaDocente;
use App\Models\CalificacionDetalle;
use App\Models\Cortes_evaluativo;
use App\Models\Matricula;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CalificacionesController extends Controller
{

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

            return redirect()->route('detalle-acta', ['actaId' => $acta->id]);
        }

        $docente = $this->getDocente();
        $estudiantes = $this->getEstudiantes($grupoId);

        $filas = [];
        DB::beginTransaction();
        try {
            $acta = new Calificaciones();
            $acta->fecha = date('Y-m-d');
            $acta->empleado_id = $docente->id;
            $acta->asignatura_id = $asignaturaId;
            $acta->observaciones = 'Acta de calificaciones del corte ' . $corteId;
            $acta->corte_evaluativo_id = $corteId;
            $acta->grupo_id = $grupoId;
            $acta->save();



            $filas = $this->almacenarFilasActa($acta, $estudiantes);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('mensaje-error', 'No se pudo generar el acta de calificaciones');
        }

        $filas = $acta->calificaciones;
        return redirect()->route('detalle-acta', ['actaId' => $acta->id]);
    }

    public function almacenarFilasActa(Calificaciones $acta, $estudiantes)
    {
        foreach ($estudiantes as $estudiante) {
            $acta->calificaciones()->create([
                'estudiante_id' => $estudiante->id,
                'corte_evaluativo_id' => $acta->corte_evaluativo_id,
            ]);
        }
    }

    public function changeNota(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'calificacion' => 'required|integer|min:0|max:100',
        ]);
        if ($validator->fails()) {
            return back()->with('mensaje-error', 'ok sdfsdfsdfsdfsdf');
        }

        $calificacion = CalificacionDetalle::query()
            ->where('id', $request->id)
            ->first();
        if ($calificacion) {
            $calificacion->calificacion = $request->calificacion;
            $calificacion->save();
            return redirect()->route('detalle-acta', ['actaId' => $calificacion->calificacion_id]);
        } else {
            return response()->json([
                'message' => 'No se encontró el detalle de calificación',
            ], 404);
        }
    }
    public function detalleActa(Request $request)
    {
        $acta = Calificaciones::query()
            ->where('id', $request->actaId)
            ->first();
        if ($acta) {
            $acta->load('calificaciones.estudiante');
            $filas = $acta->calificaciones;
            return view('calificaciones.show', compact('acta', 'filas'));
        } else {
            return response()->json([
                'message' => 'No se encontró el acta',
            ], 404);
        }
    }
    public function imprimirActa(Request $request)
    {

        $acta = Calificaciones::findOrFail($request->actaId)
            ->first();
            // dd($acta);
        if ($acta) {
            $filas = CalificacionDetalle::query()
                ->where('calificacion_id', '=', $request->actaId)
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
            ->join('organizacion_academicas', 'asignatura_docentes.organizacion_academica_id', '=', 'organizacion_academicas.id')
            ->with(['asignatura', 'grupo'])
            ->where('asignatura_docentes.empleado_id', auth()->id())
            ->where('organizacion_academicas.confirmed', true)
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
