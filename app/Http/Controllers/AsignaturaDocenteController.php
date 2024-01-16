<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAsignaturaDocenteRequest;
use App\Models\AsignaturaDocente;
use Illuminate\Http\Request;
use App\Models\Asignatura;
use App\Models\Empleado;
use App\Models\Grupos;

use App\Models\OrganizacionAcademica;


class AsignaturaDocenteController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:asignaturadocente.index')->only('index', 'show');
        $this->middleware('can:asignaturadocente.edit')->only('edit', 'update');
        $this->middleware('can:asignaturadocente.create')->only(
            'create',
            'store'
        );
        $this->middleware('can:asignaturadocente.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dd('prueba');
        // $datos['asignaturadocentes'] = AsignaturaDocente::query()
        //     ->with(['asignatura'])
        //     ->with(['empleado'])
        //     ->with(['grado'])
        //     ->with(['organizacionAcademica'])
        //     ->get();
        // return view('asignaturadocente/index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($organizacionacademica)
    { 
        $asignaturas = Asignatura::all();
        $grupos = Grupos::all();
        $empleados = Empleado::where('cargos_id', 1)->get();
   
        return view(
            'asignaturadocente/create',
            compact(
                'asignaturas',
                'empleados',
                'grupos',
                'organizacionacademica'
            )
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAsignaturaDocenteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAsignaturaDocenteRequest $request)
    {
        dd(request()->all());
        $datos = request()->except('_token');
       
       
        $organizacionDocente =   AsignaturaDocente::create($datos);
      
        return redirect()->route('organizacionacademica.show', $organizacionDocente->organizacion_academica_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AsignaturaDocente  $asignaturaDocente
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $asignaturaDocente = AsignaturaDocente::findOrFail($id);
        return view('asignaturadocente/detalles', compact('asignaturaDocente'));
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
        $empleados = Empleado::where('cargos_id', 1)->get();
        $grupos = Grupos::all();
        $organizacion_academicas = OrganizacionAcademica::all();

        return view('asignaturadocente/edit', [
            'datos' => $datos,
            'asignaturas' => $asignaturas,
            'grupos' => $grupos,
            'empleados' => $empleados,
            'organizacion_academicas' => $organizacion_academicas,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAsignaturaDocenteRequest  $request
     * @param  \App\Models\AsignaturaDocente  $asignaturaDocente
     * @return \Illuminate\Http\Response
     */
    public function update(StoreAsignaturaDocenteRequest $request, $id)
    {
        $datos = request()->except(['_token', '_method']);
        AsignaturaDocente::where('id', '=', $id)->update($datos);
        $datos = AsignaturaDocente::findOrFail($id);
        return redirect('asignaturadocente/')->with('mensaje-editar', 'ok');
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
        return redirect('asignaturadocente/')->with('mensaje-eliminar', 'ok');
    }
}
