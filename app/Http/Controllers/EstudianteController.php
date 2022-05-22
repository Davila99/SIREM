<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Models\Sexo;
use App\Models\Tutore;
use Illuminate\Http\Request;
class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['estudiantes'] = Estudiante::query()
        ->with(['tutor'])
        ->with(['sexo'])
        ->paginate(5);
        return view('estudiante/index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tutores = Tutore::all();
        $sexos = Sexo::all();
        return view('estudiante/create',compact('tutores'),compact('sexos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEstudianteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datos = request()->except('_token');
        Estudiante::insert($datos);
        return redirect('estudiantes/')->with('mensaje', 'Estudiante agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function show(Estudiante $estudiante)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datos = Estudiante::findOrFail($id);
        return view('estudiante/edit', compact('datos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEstudianteRequest  $request
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datos = request()->except(['_token', '_method']);
        Estudiante::where('id', '=', $id)->update($datos);
        $datos = Estudiante::findOrFail($id);
        return view('estudiante.edit', compact('datos'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Estudiante::destroy($id);
        return redirect('estudiantes/')->with('mensaje', 'Estudiante eliminado con exito');
    }
}
