<?php

namespace App\Http\Controllers;

use App\Models\AsignaturaDocente;
use Illuminate\Http\Request;
use App\Models\Asignatura;
use App\Models\Empleado;

class AsignaturaDocenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $datos['asignaturadocentes'] = AsignaturaDocente::query()
        ->with(['asignatura'])
        ->with(['empleado'])
        ->paginate(3);

    return view('asignaturadocente/index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $asignaturas = Asignatura::all();
        $empleados = Empleado::where('cargos_id',1)->get();
        return view('asignaturadocente/create',compact('asignaturas'),compact('empleados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAsignaturaDocenteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datos = request()->except('_token');
        AsignaturaDocente::insert($datos);
        return redirect('asignaturadoc/')->with('mensaje', 'Asignatura Docente agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AsignaturaDocente  $asignaturaDocente
     * @return \Illuminate\Http\Response
     */
    public function show(AsignaturaDocente $asignaturaDocente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AsignaturaDocente  $asignaturaDocente
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datos = AsignaturaDocente::findOrFail($id);
        $asignaturas = Asignatura::all();
        $empleados = Empleado::all();
        return view('asignaturadocente/edit',["datos"=>$datos,"asignaturas"=>$asignaturas,"empleados"=>$empleados]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAsignaturaDocenteRequest  $request
     * @param  \App\Models\AsignaturaDocente  $asignaturaDocente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datos = request()->except(['_token', '_method']);
        AsignaturaDocente::where('id', '=', $id)->update($datos);
        $datos = AsignaturaDocente::findOrFail($id);
        return redirect('asignaturas')->with('mensaje', 'Asignatura Docente editado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AsignaturaDocente  $asignaturaDocente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AsignaturaDocente::destroy($id);
        return redirect('asignaturadoc/')->with('mensaje', 'Asignatura Docentes Eliminado con exito');
    }
}
