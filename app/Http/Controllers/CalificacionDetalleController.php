<?php

namespace App\Http\Controllers;

use App\Models\CalificacionDetalle;
use App\Http\Requests\StoreCalificacionDetalleRequest;
use App\Http\Requests\UpdateCalificacionDetalleRequest;
use App\Models\AsignaturaDocente;
use App\Models\Matricula;

class CalificacionDetalleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $rules=[
        'fecha' => 'required | date',
        'empleado_id' => 'required | numeric',
        'asignatura_id' => 'required | numeric',
        'observaciones' => 'nullable | string | max:255',
        'corte' => 'required | numeric',
    ];
    public function generarActa () {
        $asignaturaid = 1;
        $grupoid = 1;
        $matriculas = Matricula::query()
            ->with([
                'estudiante'
                ])
            ->where('grupo_id', $grupoid)
            ->get();
            dd($matriculas);
    }

    public function index()
    {
        $asignaturaid = 1;
        $grupoid = 1;
        $matriculas = Matricula::query()
            ->with([
                'estudiante'
                ])
            ->where('grupo_id', $grupoid)
            ->get(); 

    //    $cursos = AsignaturaDocente::query()
    //         ->with(['grupo.'])
    //         ->where('empleado_id', auth()->id())->get();
            dd($matriculas);
        // return view('calificaciondetalles.index', [ 'cursos' => $cursos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCalificacionDetalleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCalificacionDetalleRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CalificacionDetalle  $calificacionDetalle
     * @return \Illuminate\Http\Response
     */
    public function show(CalificacionDetalle $calificacionDetalle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CalificacionDetalle  $calificacionDetalle
     * @return \Illuminate\Http\Response
     */
    public function edit(CalificacionDetalle $calificacionDetalle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCalificacionDetalleRequest  $request
     * @param  \App\Models\CalificacionDetalle  $calificacionDetalle
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCalificacionDetalleRequest $request, CalificacionDetalle $calificacionDetalle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CalificacionDetalle  $calificacionDetalle
     * @return \Illuminate\Http\Response
     */
    public function destroy(CalificacionDetalle $calificacionDetalle)
    {
        //
    }
}
