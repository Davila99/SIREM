<?php

namespace App\Http\Controllers;

use App\Models\Calificaciones;
use Illuminate\Http\Request;
use App\Models\Asignatura;
use App\Models\AsignaturaDocente;
use App\Models\Cortes_evaluativo;
use App\Models\Estudiante;
use App\Models\Grado;

class CalificacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['calificaciones'] = Calificaciones::query()
        ->with(['asiganturadocente'])
        ->with(['asigantura'])
        ->with(['grado'])
        ->with(['estudiante'])
        ->with(['cortes_evaluativo'])
        ->paginate(10);

         return view('calificaciones/index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $asignaturadocentes = AsignaturaDocente::all();
        $asignaturas = Asignatura::all();
        $grados = Grado::all();
        $estudiantes = Estudiante::all();
        $cortes_evaluativos = Cortes_evaluativo::all();
        return view('calificaciones/create',compact('asignaturadocentes'),compact('asignaturas'),
        compact('grados'),compact('estudiantes'), compact('cortes_evaluativos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCalificacionesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datos = request()->except('_token');
        Calificaciones::insert($datos);
        return redirect('calificaciones/')->with('mensaje');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Calificaciones  $calificaciones
     * @return \Illuminate\Http\Response
     */
    public function show(Calificaciones $calificaciones)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Calificaciones  $calificaciones
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datos = Calificaciones::findOrFail($id);
        $asignaturadocentes = AsignaturaDocente::all();
        $asignaturas = Asignatura::all();
        $grados = Grado::all();
        $estudiantes = Estudiante::all();
        $cortes_evaluativos = Cortes_evaluativo::all();
        return view('calificaciones/edit',["datos"=>$datos,"asignaturadocentes"=>$asignaturadocentes,
        "asignaturas"=>$asignaturas,"grados"=>$grados,"estudiantes"=>$estudiantes,
        "corte_evaluativos"=>$cortes_evaluativos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCalificacionesRequest  $request
     * @param  \App\Models\Calificaciones  $calificaciones
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datos = request()->except(['_token', '_method']);
        Calificaciones::where('id', '=', $id)->update($datos);
        $datos = Calificaciones::findOrFail($id);
        return view('calificaciones.edit', compact('datos'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Calificaciones  $calificaciones
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Calificaciones::destroy($id);
        return redirect('calificaciones/')->with('mensaje');
    }
}
