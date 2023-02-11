<?php

namespace App\Http\Controllers;

use App\Models\Asignatura;
use Illuminate\Http\Request;

class AsignaturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['asignaturas'] = Asignatura::paginate(10);
        return view('asignatura/index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('asignatura/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'descripcion' => 'required',
            ],
            [
                'descripcion.required' => 'El campo es obligatorio.',
            ]
        );
        $datos = request()->except('_token');

        Asignatura::insert($datos);
        return redirect('asignaturas/')->with('mensaje', 'ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Asignatura  $asignatura
     * @return \Illuminate\Http\Response
     */
    public function show(Asignatura $asignatura)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Asignatura  $asignatura
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datos = Asignatura::findOrFail($id);
        return view('asignatura/edit', compact('datos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Asignatura  $asignatura
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'descripcion' => 'required',
            ],
            [
                'descripcion.required' => 'El campo es obligatorio.',
            ]
        );
        $datos = request()->except(['_token', '_method']);

        Asignatura::where('id', '=', $id)->update($datos);

        $datos = Asignatura::findOrFail($id);
        return redirect('asignaturas')->with('mensaje-editar', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Asignatura  $asignatura
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Asignatura::destroy($id);
        return redirect('asignaturas/')->with('mensaje-eliminar', 'ok');
    }
}
