<?php

namespace App\Http\Controllers;

use App\Models\CalificacionDetalle;
use App\Http\Requests\StoreCalificacionDetalleRequest;
use App\Http\Requests\UpdateCalificacionDetalleRequest;
use App\Models\AsignaturaDocente;

class CalificacionDetalleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $cursos = AsignaturaDocente::query()
            ->with(['matricula'])
            ->where('empleado_id', auth()->id())->get();
            dd($cursos);
        return view('calificaciondetalles.index', [ 'cursos' => $cursos]);
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
