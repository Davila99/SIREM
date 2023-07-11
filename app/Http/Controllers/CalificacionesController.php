<?php

namespace App\Http\Controllers;

use App\Models\Calificaciones;
use Illuminate\Http\Request;
use App\Models\AsignaturaDocente;
use App\Models\Estudiante;
use App\Models\CalificacionDetalle;

use App\Models\Matricula;
use Illuminate\Support\Facades\Auth;

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
        $estudiantes = Estudiante::query()
            ->leftJoin(
                'matriculas',
                'estudiantes.id',
                '=',
                'matriculas.estudiante_id'
            )
            ->leftJoin(
                'matricula_rows',
                'matricula_rows.matricula_id',
                '=',
                'matriculas.id'
            )
            ->where('matricula_rows.id', '=', $id)
            ->get();
        return $estudiantes;
    }
    public function getCorte($id)
    {
        $corte = Calificaciones::query()
            ->where('asignatura_id', '=', $id)
            ->max('corte');
        if ($corte == null) {
            $corte = 0;
        }
        return $corte + 1;
    }

    public function generarActa($id, Request $request)
    {
        $docente = $this->getDocente();
        $estudiantes = $this->getEstudiantes($id);
        $corte = $this->getCorte($id);

        //TODO: generar acta
        $acta = $this->setActa($id, $docente, $estudiantes, $corte);

        //TODO: generar acta rows
        $filas = $this->setActaRows($acta, $estudiantes);

        dd($filas->toArray(), $acta->toArray());
    }

    public function setActa($id, $docente, $estudiantes, $corte)
    {
        $acta = new Calificaciones();
        $acta->fecha = date('Y-m-d');
        $acta->empleado_id = $docente->id;
        $acta->asignatura_id = $id;
        $acta->observaciones = 'Acta de calificaciones del corte ' . $corte;
        $acta->corte = $corte;
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
            $actaRow->save();
        }
        $filas = CalificacionDetalle::query()
            ->where('calificacion_id', '=', $acta->id)
            ->get();
            return $filas;
    }
    public function index()
    {
        $cursos = AsignaturaDocente::query()
            ->with(['asignatura'])
            ->with(['grupo'])
            ->where('empleado_id', auth()->id())
            ->get();
        // dd($cursos);
        return view('calificaciones.index', ['cursos' => $cursos]);
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
