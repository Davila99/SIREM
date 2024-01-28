<?php

namespace App\Http\Controllers;

use App\Models\AsignaturaDocente;
use App\Models\Cortes_evaluativo;
use App\Models\OrganizacionAcademica;
use Illuminate\Http\Request;

class OrganizacionAcademicaController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:organizacionacademica.index')->only(
            'index',
            'show'
        );
        $this->middleware('can:organizacionacademica.edit')->only(
            'edit',
            'update'
        );
        $this->middleware('can:organizacionacademica.create')->only(
            'create',
            'store'
        );
        $this->middleware('can:organizacionacademica.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $yearFilter = $request->input('year');
        $datos['organizacionacademicas'] = OrganizacionAcademica::query()
            ->when($yearFilter, function ($query) use ($yearFilter) {
                return $query->where('fecha', $yearFilter);
            })
            ->get();
        return view('organizacionacademica/index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('organizacionacademica/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storeorganizacion_academicaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'descripcion' => 'required',
            ],
            [
                'descripcion.required' => 'El campo es obligatorio.',
            ]
        );
        $fecha = date('Y');
        $organizacionacademica = new OrganizacionAcademica();
        $organizacionacademica->fecha = $fecha;
        $organizacionacademica->descripcion = $request->descripcion;
        $organizacionacademica->confirmed = false;
        $organizacionacademica->save();
        return redirect('organizacionacademica/')->with('mensaje', 'ok');
    }
    public function changeStatus(Request $request)
    {
        $organizacionacademica = OrganizacionAcademica::find(
            $request->organizacionacademica
        );
        $organizacionacademica->confirmed = $request->confirmed;
        $organizacionacademica->save();
        return response()->json(['success' => 'Cambio de estado con éxito.']);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\organizacion_academica  $organizacion_academica
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $datos['asignaturadocentes'] = AsignaturaDocente::query()
            ->with(['asignatura'])
            ->with(['empleado'])
            ->with(['grado'])
            ->with(['organizacionAcademica'])
            ->where('organizacion_academica_id', $id)
            ->get();
        $organizacionacademica = OrganizacionAcademica::findOrFail($id);
        return view(
            'asignaturadocente/index',
            $datos,
            compact('organizacionacademica')
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\organizacion_academica  $organizacion_academica
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datos = OrganizacionAcademica::findOrFail($id);
        return view('organizacionacademica/edit', compact('datos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updateorganizacion_academicaRequest  $request
     * @param  \App\Models\organizacion_academica  $organizacion_academica
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'descripcion' => 'required',
            ],
            [
                'descripcion.required' => 'El campo es obligatorio.',
            ]
        );

        $datos = request()->except(['_token', '_method']);
        OrganizacionAcademica::where('id', '=', $id)->update($datos);
        $datos = OrganizacionAcademica::findOrFail($id);
        return redirect('organizacionacademica')->with('mensaje-editar', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\organizacion_academica  $organizacion_academica
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            OrganizacionAcademica::destroy($id);
            return redirect('organizacionacademica')->with(
                'mensaje-eliminar',
                'ok'
            );
        } catch (\Throwable $th) {
            return redirect('organizacionacademica')->with(
                'mensaje-error-eliminar',
                'ok'
            );
        }
    }
}
