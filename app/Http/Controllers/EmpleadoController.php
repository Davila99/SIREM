<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmpleadoRequest;
use App\Http\Requests\UpdateEmpleadoRequest;
use App\Models\Cargo;
use App\Models\Empleado;
use App\Models\Grupos;
use App\Models\Niveles_academico;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:empleados.index')->only('index', 'show');
        $this->middleware('can:empleados.edit')->only('edit', 'update');
        $this->middleware('can:empleados.create')->only('create', 'store');
        $this->middleware('can:empleados.destroy')->only('destroy');
    }
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
            ->get();

        return view('empleados/index', $datos);
    }
    public function busqueda()
    {
        return view('empleados.busqueda');
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
        return view('empleados/create', compact('niveles_academicos', 'cargos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmpleadoRequest $request)
    {
        $datos = request()->except('_token');
        $existeDato = Empleado::where('nombres', $datos['nombres'])
            ->orwhere('apellidos', $datos['apellidos'])
            ->orwhere('cedula', $datos['cedula'])->exists();
        if ($existeDato) {
            return redirect('empleados/create')->with('mensaje-error', 'ok');
        } else {
            Empleado::insert($datos);
            return redirect('empleados/')->with('mensaje', 'ok');
        }

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
        $niveles_academicos = Niveles_academico::all();
        $cargos = Cargo::all();
        return view('empleados/edit', compact('datos', 'cargos', 'niveles_academicos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEmpleadoRequest  $request
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmpleadoRequest $request,Empleado $empleado)
    {
        $empleado->update($request->validated());
        return redirect('empleados')->with('mensaje-editar', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $esxiteDato = Grupos::exists($id);
        if ($esxiteDato) {
            return redirect('tutores/')->with('mensaje-error-eliminar', 'ok');
        } else {
            Empleado::destroy($id);
            return redirect('tutores/')->with('mensaje-eliminar', 'ok');
        }

    }
}
