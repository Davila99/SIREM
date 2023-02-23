<?php

namespace App\Http\Controllers;

use App\Http\Resources\EstudianteCollection;
use App\Models\Estudiante;
use App\Models\Sexo;
use App\Models\Tutore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $datos['estudiantes'] = Estudiante::query()
            ->with(['tutor'])
            ->with(['sexo'])
            ->paginate(10);
        
        return view('estudiante/index', $datos);
    }
    public function busqueda(Request $request)
    {
        $texto=trim($request->get('texto'));
        $Estudiante=DB::table('estudiantes')
                    ->select('id', 'nombres','apellidos','fecha_nacimiento','direccion','sexo')
                    ->where('nombres','LIKE','%',$texto.'%')
                    ->OnWhere('nombres','LIKE','%',$texto.'%')  
                    ->orderBy('apellidos','asc')
                    ->paginate(10);
                    return view('estudiante.busqueda',compact('Estudiante','texto'));
                    

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tutores = Tutore::all();
        $sexos = Sexo::all();
        return view('estudiante/create', compact('tutores','sexos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEstudianteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $request->validate(
            [
                'nombres' => 'required|string|max:100',
                'apellidos' => 'required|string|max:100',
                'fecha_nacimiento' => 'required|string|max:12',
                'direccion' => 'required|string|max:100',
                'tutor_id' => 'required',
                'sexo_id' => 'required'
            ],

            [
                'nombres.required' => 'El nombre es obligatorio.',
                'apellidos.required' => 'El apellido es obligatorio.',
                'fecha_nacimiento.required' => 'la fecha de nacimiento es obligatoria.',
                'direccion.required' => 'La direccion es obligatoria.',
                'tutor_id.required' => 'La profesion es obligatoria.',
                'sexo_id.required' => 'El sexo es obligatorio.',
            ]
        );
        $datos = request()->except(['_token', '_method']);
        Estudiante::insert($datos);
        return redirect('estudiantes/')->with('mensaje','ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function show(Estudiante $estudiante)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datos = Estudiante::findOrFail($id);
        $tutores = Tutore::all();
        $sexos = Sexo::all();
        return view('estudiante/edit', ["datos" => $datos, "tutores" => $tutores, "sexos" => $sexos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEstudianteRequest  $request
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {    $request->validate(
        [
            'nombres' => 'required|string|max:100',
            'apellidos' => 'required|string|max:100',
            'fecha_nacimiento' => 'required|string|max:12',
            'direccion' => 'required|string|max:100',
            'tutor_id' => 'required',
            'sexo_id' => 'required'
        ],

        [
            'nombres.required' => 'El nombre es obligatorio.',
            'apellidos.required' => 'El apellido es obligatorio.',
            'fecha_nacimiento.required' => 'la fecha de nacimiento es obligatoria.',
            'direccion.required' => 'La direccion es obligatoria.',
            'tutor_id.required' => 'La profesion es obligatoria.',
            'sexo_id.required' => 'El sexo es obligatorio.',
        ]
    );
        $datos = request()->except(['_token', '_method']);
        Estudiante::where('id', '=', $id)->update($datos);
        $datos = Estudiante::findOrFail($id);
        return redirect('estudiantes')->with('mensaje-editar','ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Estudiante::destroy($id);
        return redirect('estudiantes/')->with('mensaje-eliminar','ok');
    }

    public function search(Request $request)
    {

        if (!isset($request->term)) {
            return [
                'data' => []
            ];
        }

        $results = Estudiante::query()
            ->where('nombres', 'like', "%" . $request->term . "%")
            ->orWhere('apellidos', 'like', "%" . $request->term . "%")
            ->select('id', 'nombres', 'apellidos')
            ->get();

        return new EstudianteCollection($results);
    }
}
