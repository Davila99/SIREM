<?php

namespace App\Http\Controllers;

use App\Models\Niveles_academico;
use Illuminate\Http\Request;

class NivelesAcademicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['niveles_academicos'] = Niveles_academico::paginate(10);
        return view('nivelacademico/index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('nivelacademico/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datos = request()->except('_token');
        Niveles_academico::insert($datos);
        return redirect('nivelacademic')->with('mensaje', 'Nivel academico agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Niveles_academico  $niveles_academico
     * @return \Illuminate\Http\Response
     */
    public function show(Niveles_academico $niveles_academico)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Niveles_academico  $niveles_academico
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datos = Niveles_academico::findOrFail($id);
        return view('nivelacademico/edit', compact('datos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Niveles_academico  $niveles_academico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datos = request()->except(['_token', '_method']);
        Niveles_academico::where('id', '=', $id)->update($datos);
        $datos = Niveles_academico::findOrFail($id);
        return view('nivelacademico/index', compact('datos'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Niveles_academico  $niveles_academico
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Niveles_academico::destroy($id);
    return redirect('nivelacademic')->with('mensaje', 'Nivel academico eliminado con exito');
    }
}
