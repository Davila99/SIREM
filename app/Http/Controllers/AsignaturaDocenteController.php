<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAsignaturaDocenteRequest;
use App\Models\AsignaturaDocente;
use Illuminate\Http\Request;
use App\Models\Asignatura;
use App\Models\Empleado;
use App\Models\Grupos;
use App\Models\OrganizacionAcademica;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect; // Agregado

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

    protected function obtenerOrganizacionAcademicaId()
    {
        $organizacionAcademicaId = OrganizacionAcademica::select(
            'id'
        )->latest('id')->first();
        return $organizacionAcademicaId;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dd('prueba');
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
        $organizacionAcademicaId = $organizacionacademica;
        $organizacionAcademica = OrganizacionAcademica::findOrFail($organizacionacademica);
        return view(
            'asignaturadocente/create',
            compact(
                'asignaturas',
                'empleados',
                'grupos',
                'organizacionAcademicaId',
                'organizacionAcademica'
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
        $datos = request()->except('_token');
        AsignaturaDocente::insert($datos);
        $ultimoInsertId = DB::getPdo()->lastInsertId();
        $organizacionDocente = AsignaturaDocente::findOrFail($ultimoInsertId);
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