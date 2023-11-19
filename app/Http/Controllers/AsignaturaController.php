<?php

namespace App\Http\Controllers;

use App\Http\Requests\AsignaturaRequest;
use App\Models\Asignatura;
use Illuminate\Http\Request;

class AsignaturaController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:asignaturas.index')->only('index', 'show');
        $this->middleware('can:asignaturas.edit')->only('edit', 'update');
        $this->middleware('can:cargos.create')->only('create', 'store');
        $this->middleware('can:asignaturas.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['asignaturas'] = Asignatura::get();
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
    public function store(AsignaturaRequest $request)
    {
        $datos = request()->except('_token');
        $existeDato = Asignatura::where('descripcion', $datos)->exists();
        if ($existeDato) {
            return redirect('asignaturas/create')->with('mensaje-error', 'ok');
        } else {
            Asignatura::insert($datos);
            return redirect('asignaturas/')->with('mensaje', 'ok');
        }
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
    public function update(AsignaturaRequest $request,Asignatura $asignatura)
    {
        $existeDato = Asignatura::where('descripcion', $request)->exists();
        if ($existeDato) {
            return redirect('asignaturas/' . $asignatura . '/edit')->with(
                'mensaje-error',
                'ok'
            );
        } else {
            $asignatura->update($request->validated());
            return redirect('asignaturas')->with('mensaje-editar', 'ok');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Asignatura  $asignatura
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Asignatura::destroy($id);
            return redirect('asignaturas/')->with('mensaje-eliminar', 'ok');
        } catch (\Throwable $th) {
            return redirect('asignaturas/')->with('mensaje-error-eliminar', 'ok');
        }

    }
}
