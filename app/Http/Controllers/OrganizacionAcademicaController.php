<?php

namespace App\Http\Controllers;

use App\Models\organizacion_academica;
use Illuminate\Http\Client\Request as ClientRequest;
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
        $datos['organizacionacademicas'] = organizacion_academica::paginate(10);
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
        
        $fecha = date('Y-m-d');
        $organizacionacademica = new organizacion_academica();
        $organizacionacademica->fecha = $fecha;
        $organizacionacademica->descripcion = $request->descripcion;
        $organizacionacademica->confirmed = false;
        $organizacionacademica->save();
        return redirect('organizacionacademica/')->with('mensaje', 'ok');
    }
    public function changeStatus(Request $request)
    {
        $fecha = date('Y-m-d');
        $organizacionacademica = new organizacion_academica();
        $organizacionacademica->fecha = $fecha;
        $organizacionacademica->descripcion = $request->descripcion;
        $organizacionacademica->confirmed =$request->confirmed;
        $organizacionacademica->save();
  
        return response()->json(['success'=>'Status change successfully.']);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\organizacion_academica  $organizacion_academica
     * @return \Illuminate\Http\Response
     */
    public function show(organizacion_academica $organizacion_academica)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\organizacion_academica  $organizacion_academica
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updateorganizacion_academicaRequest  $request
     * @param  \App\Models\organizacion_academica  $organizacion_academica
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
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
            organizacion_academica::destroy($id);
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
