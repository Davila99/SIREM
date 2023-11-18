<?php

namespace App\Http\Controllers;

use App\Http\Requests\EstudianteRequest;
use App\Http\Resources\EstudianteCollection;
use App\Imports\EstudiantesImport;
use App\Models\Estudiante;
use App\Models\Sexo;
use App\Models\Tutore;
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
    public function store(EstudianteRequest $request)
    {
        $datos = request()->except('_token');
        $existeDato = Estudiante::query()
            ->where('nombres', $datos['nombres'])
            ->where('apellidos', $datos['apellidos'])
            ->exists();
        if ($existeDato) {
            return redirect('estudiantes/create')->with('mensaje-error', 'ok');
        } else {
            Estudiante::create($datos);
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
    public function update(EstudianteRequest $request, Estudiante $estudiante)
    {
        $estudiante->update($request->validated());
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

    public function importarEstudiante(Request $request)
    {

        if ($request->hasFile('documento')) {
            $file = $request->file('documento');
            Excel::import(new EstudiantesImport, $file);
        }

        return back()->with('mensaje-registro', 'ok');
    }
}
