<?php

namespace App\Http\Controllers;

use App\Http\Requests\GradoRequest;
use App\Models\Grado;


class GradoController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:grados.index')->only('index', 'show');
        $this->middleware('can:grados.edit')->only('edit', 'update');
        $this->middleware('can:grados.create')->only('create', 'store');
        $this->middleware('can:grados.destroy')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['grados'] = Grado::get();

        return view('grado/index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('grado/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GradoRequest $request)
    {
        $datos = request()->except('_token');
        $existeDato = Grado::where('descripcion', $datos)->exists();
        if ($existeDato) {
            return redirect('grados/create')->with('mensaje-error', 'ok');
        } else {
            Grado::insert($datos);
            return redirect('grados/')->with('mensaje', 'ok');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Grado  $grado
     * @return \Illuminate\Http\Response
     */
    public function show(Grado $grado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Grado  $grado
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datos = Grado::findOrFail($id);
        return view('grado/edit', compact('datos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Grado  $grado
     * @return \Illuminate\Http\Response
     */
    public function update(GradoRequest $request,Grado $grado)
    {
        $datos = request()->except(['_token', '_method']);
        $existeDato = Grado::where('descripcion', $datos)->exists();
        if ($existeDato) {
            return redirect('grados/' . $grado . '/edit')->with(
                'mensaje-error',
                'ok'
            );
        } else {
            $grado->update($request->validated());
            return redirect('grados')->with('mensaje-editar', 'ok');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Grado  $grado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Grado::destroy($id);
            return redirect('grados/')->with('mensaje-eliminar', 'ok');
        } catch (\Throwable $th) {
            return redirect('grados')->with('mensaje-error-eliminar', 'ok');
        }
    }
}
