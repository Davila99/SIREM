<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use Illuminate\Http\Request;

class CargoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['cargos'] = Cargo::paginate(10);
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
    public function store(Request $request)
    {
        
        $datos = request()->except('_token');
        $datos = $request->validate([
            'descripcion' => 'required',
        ]);  
        Cargo::insert($datos);
        return redirect('cargos/')->with('mensaje');
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
    public function update(Request $request, $id)
    {   
       
        $datos = request()->except(['_token', '_method']);
        $datos = $request->validate([
            'descripcion' => 'required',
        ]);  

        Cargo::where('id', '=', $id)->update($datos);

        $datos = Cargo::findOrFail($id);
        return redirect('cargos/')->with('mensaje-editar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cargo  $cargo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cargo::destroy($id);
        return redirect('cargos/')->with('mesaje-eliminar');
    }
}
