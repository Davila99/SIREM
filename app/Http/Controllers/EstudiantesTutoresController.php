<?php

namespace App\Http\Controllers;

use App\Models\EstudiantesTutores;
use Illuminate\Http\Request;
use App\Models\Estudiante;
use App\Models\Tutore;

class EstudiantesTutoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $datos['estudiantestutores'] = EstudiantesTutores::query()
        ->with(['estudiante'])
        ->with(['tutores'])
        ->paginate(10);
      
        return view('estudianteTutor/index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estudiantes = Estudiante::all();
        $tutores = Tutore::all();
        return view('estudianteTutor/create',compact('estudiantes'),compact('tutores'));


       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEstudiantesTutoresRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datos = request()->except('_token');
        EstudiantesTutores::insert($datos);
        return redirect('tutorestudiante/')->with('mensaje', 'ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EstudiantesTutores  $estudiantesTutores
     * @return \Illuminate\Http\Response
     */
    public function show(EstudiantesTutores $estudiantesTutores)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EstudiantesTutores  $estudiantesTutores
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datos = EstudiantesTutores::findOrFail($id);
        $estudiantes = Estudiante::all();
        $tutores = Tutore::all();
        return view('estudianteTutor/edit',["datos"=>$datos,"estudiantes"=>$estudiantes,"tutores"=>$tutores]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEstudiantesTutoresRequest  $request
     * @param  \App\Models\EstudiantesTutores  $estudiantesTutores
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datos = request()->except(['_token', '_method']);
        EstudiantesTutores::where('id', '=', $id)->update($datos);
        $datos = EstudiantesTutores::findOrFail($id);
        return redirect('tutorestudiante')->with('mensaje-editar', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EstudiantesTutores  $estudiantesTutores
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        EstudiantesTutores::destroy($id);
        return redirect('tutorestudiante/')->with('mensaje-eliminar', ' ok');
    }
}
