<?php

namespace App\Http\Controllers;


use App\Models\Cargo;
use App\Models\Empleado;
use App\Models\Niveles_academico;
use Illuminate\Http\Request;
class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['empleados'] = Empleado::query()
        ->with(['nivel_academico'])
        ->with(['cargos'])
        ->paginate(10);
      
        return view('empleados/index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $niveles_academicos = Niveles_academico::all();
        $cargos = Cargo::all();
        return view('empleados/create', compact('niveles_academicos'), compact('cargos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datos = request()->except('_token');
        Empleado::insert($datos);
        return redirect('empleados/')->with('mensaje', 'Empleado agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empleado = Empleado::findOrFail($id);
        // dd($empleado);
        return view('empleados/perfil', compact('empleado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datos = Empleado::findOrFail($id);
        return view('empleados/edit', compact('datos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEmpleadoRequest  $request
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datos = request()->except(['_token', '_method']);
        Empleado::where('id', '=', $id)->update($datos);
        $datos = Empleado::findOrFail($id);
        return redirect('empleados')->with('mensaje-editar', 'Empleado editado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Empleado::destroy($id);
        return redirect('empleados/')->with('mesaje-eliminar', 'Empleado Eliminado con exito');
    }
}
