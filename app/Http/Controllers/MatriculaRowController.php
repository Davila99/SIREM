<?php

namespace App\Http\Controllers;

use App\Models\MatriculaRow;
use App\Http\Requests\StoreMatriculaRowRequest;
use App\Http\Requests\UpdateMatriculaRowRequest;

class MatriculaRowController extends Controller
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
     * @param  \App\Http\Requests\StoreMatriculaRowRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMatriculaRowRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MatriculaRow  $matriculaRow
     * @return \Illuminate\Http\Response
     */
    public function show(MatriculaRow $matriculaRow)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MatriculaRow  $matriculaRow
     * @return \Illuminate\Http\Response
     */
    public function edit(MatriculaRow $matriculaRow)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMatriculaRowRequest  $request
     * @param  \App\Models\MatriculaRow  $matriculaRow
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMatriculaRowRequest $request, MatriculaRow $matriculaRow)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MatriculaRow  $matriculaRow
     * @return \Illuminate\Http\Response
     */
    public function destroy(MatriculaRow $matriculaRow)
    {
        //
    }
}
