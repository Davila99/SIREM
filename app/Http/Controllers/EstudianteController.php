<?php

namespace App\Http\Controllers;

use App\Http\Resources\EstudianteCollection;
use App\Imports\EstudiantesImport;
use App\Models\Estudiante;
use App\Models\Sexo;
use App\Models\Tutore;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;


class EstudianteController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:estudiantes.index')->only('index', 'show');
        $this->middleware('can:estudiantes.edit')->only('edit', 'update');
        $this->middleware('can:estudiantes.create')->only('create', 'store');
        $this->middleware('can:estudiantes.destroy')->only('destroy');

    }
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
            ->get();

        return view('estudiante/index', $datos);
    }
    public function busqueda()
    {
        return view('estudiante.busqueda');
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
        return view('estudiante/create', compact('tutores', 'sexos'));
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
                'sexo_id' => 'required',
            ],

            [
                'nombres.required' => 'El nombre es obligatorio.',
                'apellidos.required' => 'El apellido es obligatorio.',
                'fecha_nacimiento.required' =>
                'la fecha de nacimiento es obligatoria.',
                'direccion.required' => 'La direccion es obligatoria.',
                'tutor_id.required' => 'La profesion es obligatoria.',
                'sexo_id.required' => 'El sexo es obligatorio.',
            ]
        );
        $datos = request()->except('_token');
        $existeDato = Estudiante::where('nombres', $datos['nombres'])->exists();
        if ($existeDato) {
            return redirect('estudiantes/create')->with('mensaje-error', 'ok');
        } else {
            $estudiante = new Estudiante();
            $estudiante->nombres = $request->nombres;
            $estudiante->apellidos = $request->apellidos;
            $estudiante->fecha_nacimiento = $request->fecha_nacimiento;
            $estudiante->edad = Carbon::createFromDate(
                $request->fecha_nacimiento
            )->age;
            $estudiante->direccion = $request->direccion;
            $estudiante->tutor_id = $request->tutor_id;
            $estudiante->sexo_id = $request->sexo_id;
            $estudiante->save();
            return redirect('estudiantes/')->with('mensaje', 'ok');
        }

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
        return view('estudiante/edit', [
            'datos' => $datos,
            'tutores' => $tutores,
            'sexos' => $sexos,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEstudianteRequest  $request
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'nombres' => 'required|string|max:100',
                'apellidos' => 'required|string|max:100',
                'fecha_nacimiento' => 'required|string|max:12',
                'direccion' => 'required|string|max:100',
                'tutor_id' => 'required',
                'sexo_id' => 'required',
            ],

            [
                'nombres.required' => 'El nombre es obligatorio.',
                'apellidos.required' => 'El apellido es obligatorio.',
                'fecha_nacimiento.required' =>
                'la fecha de nacimiento es obligatoria.',
                'direccion.required' => 'La direccion es obligatoria.',
                'tutor_id.required' => 'La profesion es obligatoria.',
                'sexo_id.required' => 'El sexo es obligatorio.',
            ]
        );

        $estudiante = Estudiante::findOrFail($id);
        $estudiante->nombres = $request->nombres;
        $estudiante->apellidos = $request->apellidos;
        $estudiante->fecha_nacimiento = $request->fecha_nacimiento;
        $estudiante->edad = Carbon::createFromDate(
            $request->fecha_nacimiento
        )->age;
        $estudiante->direccion = $request->direccion;
        $estudiante->tutor_id = $request->tutor_id;
        $estudiante->sexo_id = $request->sexo_id;
        $estudiante->save();

        return redirect('estudiantes')->with('mensaje-editar', 'ok');
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
        return redirect('estudiantes/')->with('mensaje-eliminar', 'ok');
    }

    public function search(Request $request)
    {
        if (!isset($request->term)) {
            return [
                'data' => [],
            ];
        }

        $results = Estudiante::query()
            ->where('nombres', 'like', '%' . $request->term . '%')
            ->orWhere('apellidos', 'like', '%' . $request->term . '%')
            ->select('id', 'nombres', 'apellidos')
            ->get();

        return new EstudianteCollection($results);
    }

    public function importarEstudiante (Request $request){
        
        if ($request->hasFile('documento')) {
            $file = $request->file('documento');
            Excel::import(new EstudiantesImport, $file);
        }
    
        return back()->with('mensaje-registro', 'ok');
    }
}
