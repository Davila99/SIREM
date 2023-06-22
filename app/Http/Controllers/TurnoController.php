<?php

namespace App\Http\Controllers;

use App\Models\Turno;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateTurnoRequest;

class TurnoController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:turnos.index')->only('index');
        $this->middleware('can:turnos.edit')->only('edit','update');
        $this->middleware('can:turnos.show')->only('show');
        $this->middleware('can:turnos.store')->only('store');
        $this->middleware('can:turnos.destroy')->only('destroy');
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['turnos'] = Turno::paginate(10);
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
        Turno::insert($datos);
        return redirect('turnos/')->with('mensaje', 'ok');
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

        Turno::where('id', '=', $id)->update($datos);

        $datos = Turno::findOrFail($id);
        return redirect('turnos')->with('mensaje-editar', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Turno  $turno
     * @return \Illuminate\Http\Response
     */
    public function destroy($id )
    {
        try {
            Turno::destroy($id);
            return redirect('turnos')->with('mensaje-eliminar','ok');
        } catch (\Throwable $th) {

            return redirect('turnos')->with('mensaje-error-eliminar','ok');
        }
    }
}
