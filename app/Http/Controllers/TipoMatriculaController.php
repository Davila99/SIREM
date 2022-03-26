<?php

namespace App\Http\Controllers;

use App\Models\Tipo_Matricula;
use App\Http\Requests\StoreTipo_MatriculaRequest;
use App\Http\Requests\UpdateTipo_MatriculaRequest;

class TipoMatriculaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreTipo_MatriculaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTipo_MatriculaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tipo_Matricula  $tipo_Matricula
     * @return \Illuminate\Http\Response
     */
    public function show(Tipo_Matricula $tipo_Matricula)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tipo_Matricula  $tipo_Matricula
     * @return \Illuminate\Http\Response
     */
    public function edit(Tipo_Matricula $tipo_Matricula)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTipo_MatriculaRequest  $request
     * @param  \App\Models\Tipo_Matricula  $tipo_Matricula
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTipo_MatriculaRequest $request, Tipo_Matricula $tipo_Matricula)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tipo_Matricula  $tipo_Matricula
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tipo_Matricula $tipo_Matricula)
    {
        //
    }
}
