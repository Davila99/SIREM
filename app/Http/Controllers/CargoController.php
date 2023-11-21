<?php

namespace App\Http\Controllers;

use App\Http\Requests\CargoRequest;
use App\Models\Cargo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CargoController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:cargos.index')->only('index', 'show');
        $this->middleware('can:cargos.edit')->only('edit', 'update');
        $this->middleware('can:cargos.create')->only('create', 'store');
        $this->middleware('can:cargos.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['cargos'] = Cargo::get();
        return view('cargo/index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cargo/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CargoRequest $request)
    {
        $datos = request()->except('_token');
        $existeDato = Cargo::where('descripcion', $datos)->exists();
        if ($existeDato) {
            return redirect('cargos/create')->with('mensaje-error', 'ok');
        } else {
            Cargo::insert($datos);
            return redirect('cargos/')->with('mensaje', 'ok');
        }   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cargo  $cargo
     * @return \Illuminate\Http\Response
     */
    public function show(Cargo $cargo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cargo  $cargo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datos = Cargo::findOrFail($id);
        return view('cargo/edit', compact('datos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cargo  $cargo
     * @return \Illuminate\Http\Response
     */
    public function update(CargoRequest $request,Cargo $cargo)
    {
        $datos = request()->except(['_token', '_method']);    
        $existeDato = Cargo::where('descripcion', $datos)->exists();
        if ($existeDato) {
            return redirect('cargos/' . $cargo->id . '/edit')->with('mensaje-error', 'ok');
        } else {
            $cargo->update($request->validated());
            return redirect('cargos')->with('mensaje-editar', 'ok');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cargo  $cargo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Cargo::destroy($id);
            return redirect('cargos')->with('mensaje-eliminar', 'ok');
        } catch (\Throwable $th) {
            return redirect('cargos')->with('mensaje-error-eliminar', 'ok');
        }
    }
}
