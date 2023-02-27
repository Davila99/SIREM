<?php

namespace App\Http\Controllers;

use App\Models\organizacion_academica;
use App\Http\Requests\Storeorganizacion_academicaRequest;
use App\Http\Requests\Updateorganizacion_academicaRequest;

class OrganizacionAcademicaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dd('hola desde did');
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
     * @param  \App\Http\Requests\Storeorganizacion_academicaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storeorganizacion_academicaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\organizacion_academica  $organizacion_academica
     * @return \Illuminate\Http\Response
     */
    public function show(organizacion_academica $organizacion_academica)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\organizacion_academica  $organizacion_academica
     * @return \Illuminate\Http\Response
     */
    public function edit(organizacion_academica $organizacion_academica)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updateorganizacion_academicaRequest  $request
     * @param  \App\Models\organizacion_academica  $organizacion_academica
     * @return \Illuminate\Http\Response
     */
    public function update(Updateorganizacion_academicaRequest $request, organizacion_academica $organizacion_academica)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\organizacion_academica  $organizacion_academica
     * @return \Illuminate\Http\Response
     */
    public function destroy(organizacion_academica $organizacion_academica)
    {
        //
    }
}
