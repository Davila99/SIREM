<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCalificacionDetalleRequest;
use App\Http\Requests\UpdateCalificacionDetalleRequest;
use App\Models\CalificacionDetalle;
use App\Models\Matricula;

class CalificacionDetalleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

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
    public function edit($id)
    {
        $datos = CalificacionDetalle::findOrFail($id);
        return response()->modal('calificacionDetalle.edit', compact('datos'));
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
