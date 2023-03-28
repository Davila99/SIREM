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
        return view('empleados/create', compact('niveles_academicos','cargos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $request->validate(
            [
                'nombres' => 'required|string|max:100',
                'apellidos' => 'required|string|max:100',
                'telefono' => 'required|string|max:12',
                'cedula' => 'required|string|max:16',
                'fecha_nacimiento' => 'required',
                'nivel_academico_id' => 'required',
                'direccion' => 'required|string|max:100',
                'email' => 'required',
                'fecha_ingreso' => 'required',
                'cargos_id' => 'required',
            ],

            [
                'nombres.required' => 'El nombre es obligatorio.',
                'apellidos.required' => 'El apellido es obligatorio.',
                'telefono.required' => 'El numero telefono es obligatorio.',
                'cedula.required' => 'El numero cedula es obligatorio.',
                'fecha_nacimiento.required' => 'La fecha de nacimiento es obligatoria.',
                'nivel_academico_id.required' => 'El nivel academico es obligatorio.',
                'direccion.required' => 'La dirección es obligatoria.',
                'email.required' => 'El email es obligatoria.',
                'fecha_ingreso.required' => 'La fecha de ingresp es obligatoria.',
                'cargos_id.required' => 'El cargo es obligatorio.',
            ]
        );
        $datos = request()->except('_token');
        Empleado::insert($datos);
        return redirect('empleados/')->with('mensaje','ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $datos['empleados'] = Empleado::findOrFail($id)
        ->with(['nivel_academico'])
        ->with(['cargos'])  
        ->paginate(10);
        dd($datos);
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
        return view('empleados/edit', compact('datos','cargos','niveles_academicos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEmpleadoRequest  $request
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)

    {   $request->validate(
        [
            'nombres' => 'required|string|max:100',
            'apellidos' => 'required|string|max:100',
            'telefono' => 'required|string|max:12',
            'cedula' => 'required|string|max:16',
            'fecha_nacimiento' => 'required',
            'nivel_academico_id' => 'required',
            'direccion' => 'required|string|max:100',
            'email' => 'required',
            'fecha_ingreso' => 'required',
            'cargos_id' => 'required',
        ],

        [
            'nombres.required' => 'El nombre es obligatorio.',
            'apellidos.required' => 'El apellido es obligatorio.',
            'telefono.required' => 'El numero telefono es obligatorio.',
            'cedula.required' => 'El numero cedula es obligatorio.',
            'fecha_nacimiento.required' => 'La fecha de nacimiento es obligatoria.',
            'nivel_academico_id.required' => 'El nivel academico es obligatorio.',
            'direccion.required' => 'La dirección es obligatoria.',
            'email.required' => 'El email es obligatoria.',
            'fecha_ingreso.required' => 'La fecha de ingresp es obligatoria.',
            'cargos_id.required' => 'El cargo es obligatorio.',
        ]
    );

        $datos = request()->except(['_token', '_method']);
        Empleado::where('id', '=', $id)->update($datos);
        $datos = Empleado::findOrFail($id);
        return redirect('empleados')->with('mensaje-editar','ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        try {
            Empleado::destroy($id);
            return redirect('empleados/')->with('mensaje-eliminar','ok');
        } catch (\Throwable $th) {
            return redirect('empleados')->with('mensaje-error-eliminar','ok');
        }

    }
}
