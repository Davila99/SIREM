<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Http\Requests\StoreEmpleadoRequest;
use App\Http\Requests\UpdateEmpleadoRequest;
use App\Models\Cargo;
use App\Models\Niveles_academico;

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
        ->paginate(3);

    return view('empleados/index', $datos,$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cargos = Cargo::all();

        return view('empleados/create',compact('cargos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEmpleadoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmpleadoRequest $request)
    {/**
        $campos =
        [
            'nombre' => 'required|string|max:100',
            'apellido' => 'required|string|max:100',
            'email' => 'required|email',
            'telefono' => 'required|string|max:100',


        ];
    $mensaje = [
        'required' => 'El :attribute es requerido',
    ];

    $this->validate($request, $campos, $mensaje);
    $datos = request()->except('_token');



    Empleado::insert($datos);
    return redirect('empleado/')->with('mensaje', 'Estudiante agregado con exito');*/
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit(Empleado $id)
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
    public function update(UpdateEmpleadoRequest $request, Empleado $id)
    {
        $campos =
            [
                'nombre' => 'required|string|max:100',
                'apellido' => 'required|string|max:100',
                'correo' => 'required|email',
                'telefono' => 'required|string|max:100',

            ];

        $mensaje = [
            'required' => 'El :attribute es requerido',

        ];

        $this->validate($request, $campos, $mensaje);

        //excluimos el token y la infromacion de method
        $datos = request()->except(['_token', '_method']);



        Empleado::where('id', '=', $id)->update($datos);
        $datos = Empleado::findOrFail($id);

        return view('empleados.edit', compact('datos'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empleado $id)
    {
        $empleado = Empleado::findOrFail($id);



        return redirect('empleados/')->with('mensaje', 'Estudiante Eliminado con exito');
    }
}
