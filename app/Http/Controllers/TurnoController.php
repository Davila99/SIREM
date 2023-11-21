<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTurnoRequest;
use App\Http\Requests\UpdateTurnoRequest;
use App\Models\Turno;
use Illuminate\Http\Request;

class TurnoController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:turnos.index')->only('index', 'show');
        $this->middleware('can:turnos.edit')->only('edit', 'update');
        $this->middleware('can:turnos.create')->only('create', 'store');
        $this->middleware('can:turnos.destroy')->only('destroy');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['turnos'] = Turno::get();
        return view('turno/index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('turno/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTurnoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTurnoRequest $request)
    {
        $datos = request()->except('_token');
        $existeDato = Turno::where('descripcion', $datos)->exists();
        if ($existeDato) {
            return redirect('turnos/create')->with('mensaje-error', 'ok');
        } else {
            Turno::insert($datos);
            return redirect('turnos/')->with('mensaje', 'ok');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Turno  $turno
     * @return \Illuminate\Http\Response
     */
    public function show(Turno $turno)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Turno  $turno
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datos = Turno::findOrFail($id);
        return view('turno/edit', compact('datos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTurnoRequest  $request
     * @param  \App\Models\Turno  $turno
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTurnoRequest $request,Turno $turno)
    {
        $datos = request()->except(['_token', '_method']);
        $existeDato = Turno::where('descripcion', $datos)->exists();
        if ($existeDato) {
            return redirect('turnos/' . $turno->id . '/edit')->with('mensaje-error', 'ok');
        } else {
            $turno->update($request->validated());
            return redirect('turnos')->with('mensaje-editar', 'ok');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Turno  $turno
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Turno::destroy($id);
            return redirect('turnos')->with('mensaje-eliminar', 'ok');
        } catch (\Throwable $th) {

            return redirect('turnos')->with('mensaje-error-eliminar', 'ok');
        }
    }
}
