<?php

namespace App\Http\Controllers;

use App\Models\Tutore;
use App\Http\Requests\StoreTutoreRequest;
use App\Http\Requests\UpdateTutoreRequest;

class TutoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('tutores.index');
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
     * @param  \App\Http\Requests\StoreTutoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTutoreRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tutore  $tutore
     * @return \Illuminate\Http\Response
     */
    public function show(Tutore $tutore)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tutore  $tutore
     * @return \Illuminate\Http\Response
     */
    public function edit(Tutore $tutore)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTutoreRequest  $request
     * @param  \App\Models\Tutore  $tutore
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTutoreRequest $request, Tutore $tutore)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tutore  $tutore
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tutore $tutore)
    {
        //
    }
}
