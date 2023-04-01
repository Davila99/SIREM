<?php

namespace App\Http\Controllers;

use App\Models\Matricula;
use App\Models\Estudiante;
use App\Models\Grupos;
use App\Models\Tipo_Matricula;
use Illuminate\Http\Request;

class MatriculaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos['matriculas'] = Matricula::query()
            ->with(['estudiante'])
            ->with(['tipo_matricula'])
            ->with(['grupo'])
            ->with(['user'])
            ->paginate(10);
            // return dd($datos);
            return view('matriculas/index', $datos);
        
    }
    public function busqueda()
    {
        return view('matriculas.busqueda');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('matriculas/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMatriculaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'estudiante_id' => 'required',
                'tipo_matricula_id' => 'required',
                'grupo_id' => 'required',
            ],
    
            [
    
                'estudiante_id.required' => 'El estudiantes es obligatorio.',
                'tipo_matricula_id.required' => 'El tipo de matricula es obligatorio.',
                'grupo_id.required' => 'El grupo es obligatorio.',
            ]
        );


        $fecha = date('d-m-Y');
        $matricula = new Matricula();
        $user_id = auth()->id();
        $matricula->user_id = $user_id;
        $matricula->fecha = $fecha;
        $matricula->estudiante_id = $request->estudiante_id;
        $matricula->tipo_matricula_id = $request->tipo_matricula_id;
        $matricula->grupo_id = $request->grupo_id;
        $matricula->save();
      
        return redirect('matriculas/')->with('mensaje','ok');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Matricula  $matricula
     * @return \Illuminate\Http\Response
     */
    public function show(Matricula $matricula)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Matricula  $matricula
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datos = Matricula::findOrFail($id);
        $estudiante = Estudiante::all();
        $tipo_matricula = Tipo_Matricula::all();
        $grupos = Grupos::all();
       
        return view('matriculas/edit',["datos"=>$datos,"estudiante"=>$estudiante,"tipo_matricula"=>$tipo_matricula,"grupos"=>$grupos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMatriculaRequest  $request
     * @param  \App\Models\Matricula  $matricula
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'estudiante_id' => 'required',
                'tipo_matricula_id' => 'required',
                'grupo_id' => 'required',
            ],
    
            [
    
                'estudiante_id.required' => 'El estudiantes es obligatorio.',
                'tipo_matricula_id.required' => 'El tipo de matricula es obligatorio.',
                'grupo_id.required' => 'El grupo es obligatorio.',
            ]
        );

        $datos = request()->except(['_token', '_method']);
        Matricula::where('id', '=', $id)->update($datos);
        $datos = Matricula::findOrFail($id);
        return redirect('matriculas/')->with('mensaje-editar','ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Matricula  $matricula
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Matricula::destroy($id);
        return redirect('matriculas/')->with('mensaje-eliminar','ok');
    }
}
