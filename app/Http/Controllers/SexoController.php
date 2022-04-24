<?php

namespace App\Http\Controllers;

use App\Models\Sexo;
use App\Http\Requests\StoreSexoRequest;
use App\Http\Requests\UpdateSexoRequest;

class SexoController extends Controller
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
     * @param  \App\Http\Requests\StoreSexoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSexoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sexo  $sexo
     * @return \Illuminate\Http\Response
     */
    public function show(Sexo $sexo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sexo  $sexo
     * @return \Illuminate\Http\Response
     */
    public function edit(Sexo $sexo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSexoRequest  $request
     * @param  \App\Models\Sexo  $sexo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSexoRequest $request, Sexo $sexo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sexo  $sexo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sexo $sexo)
    {
        //
    }
}
