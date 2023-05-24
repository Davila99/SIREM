<?php

namespace App\Http\Controllers;

use App\Models\AsignaturaDocente;
use App\Models\OrganizacionAcademica;
use Illuminate\Http\Request;

class OrganizacionAcademicaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['organizacionacademicas'] = OrganizacionAcademica::paginate(10);
        // dd($datos);
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
        $fecha = date('Y-m-d');
        $organizacionacademica = new OrganizacionAcademica();
        $organizacionacademica->fecha = $fecha;
        $organizacionacademica->descripcion = $request->descripcion;
        $organizacionacademica->confirmed = false;
        $organizacionacademica->save();
        return redirect('organizacionacademica/')->with('mensaje', 'ok');
    }
    public function changeStatus(Request $request)
    {
        $organizacionacademica = OrganizacionAcademica::find($request->organizacionacademica);
        $organizacionacademica->confirmed =$request->confirmed;
        $organizacionacademica->save();
        return response()->json(['success'=>'Cambio de estado con éxito.']);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\organizacion_academica  $organizacion_academica
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $orgizacionacademica = OrganizacionAcademica::findOrFail($id);
        dd($orgizacionacademica);
        return view('organizacionacademica/detalles', compact('orgizacionacademica'));
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
        return view('organizacionacademica/edit',compact('datos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updateorganizacion_academicaRequest  $request
     * @param  \App\Models\organizacion_academica  $organizacion_academica
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
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
        return redirect('organizacionacademica')->with('mensaje-editar','ok');
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
