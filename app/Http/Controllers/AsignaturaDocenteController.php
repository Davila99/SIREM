<?php

namespace App\Http\Controllers;

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
        $datos['asignaturadocentes'] = AsignaturaDocente::query()
            ->with(['asignatura'])
            ->with(['empleado'])
            ->with(['grado'])
            ->with(['organizacionAcademica'])
            ->get();

        // dd($datos);
        return view('asignaturadocente/index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $asignaturas = Asignatura::all();
        $grupos = Grupos::all();
        $organizacion_academicas = OrganizacionAcademica::all();
        $empleados = Empleado::where('cargos_id', 1)->get();

        return view(
            'asignaturadocente/create',
            compact(
                'asignaturas',
                'empleados',
                'grupos',
                'organizacion_academicas'
            )
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAsignaturaDocenteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'organizacion_academica_id' => 'required',
                'asignatura_id' => 'required',
                'empleado_id' => 'required',
                'grupo_id' => 'required',
            ],

            [
                'organizacion_academica_id.required' =>
                    'Organización Academica es obligatorio.',
                'asignatura_id.required' => 'La asignatura es obligatorio.',
                'empleado_id.required' => 'El empleado es obligatorio.',
                'grupo_id.required' => 'El grupo es obligatorio.',
            ]
        );
        $datos = request()->except('_token');
        AsignaturaDocente::insert($datos);
        return redirect('asignaturadocente/')->with('mensaje', 'ok');
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

        return view('asignaturadocente/edit', [
            'datos' => $datos,
            'asignaturas' => $asignaturas,
            'grupos' => $grupos,
            'empleados' => $empleados,
        ]);
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
        $request->validate(
            [
                'asignatura_id' => 'required',
                'empleado_id' => 'required',
                'grupo_id' => 'required',
            ],

            [
                'asignatura_id.required' => 'La asignatura es obligatorio.',
                'empleado_id.required' => 'El empleado es obligatorio.',
                'grupo_id.required' => 'El grupo es obligatorio.',
            ]
        );
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
