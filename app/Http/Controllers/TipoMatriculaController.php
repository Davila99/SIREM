<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTipo_MatriculaRequest;
use App\Http\Resources\TipoMatriculaCollection;
use App\Models\Tipo_Matricula;
use Illuminate\Http\Request;

class TipoMatriculaController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:tmatricula.index')->only('index', 'show');
        $this->middleware('can:tmatricula.edit')->only('edit', 'update');
        $this->middleware('can:tmatricula.create')->only('create', 'store');
        $this->middleware('can:tmatricula.destroy')->only('destroy');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['tipo__matriculas'] = Tipo_Matricula::get();
        return view('tipoMatricula/index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipoMatricula/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTipo_MatriculaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTipo_MatriculaRequest $request)
    {
        $datos = request()->except('_token');
        $existeDato = Tipo_Matricula::where('descripcion', $datos)->exists();
        if ($existeDato) {
            return redirect('tmatricula/create')->with('mensaje-error', 'ok');
        } else {
            Tipo_Matricula::insert($datos);
            return redirect('tmatricula/')->with('mensaje', 'ok');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tipo_Matricula  $tipo_Matricula
     * @return \Illuminate\Http\Response
     */
    public function show(Tipo_Matricula $tipo_Matricula)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tipo_Matricula  $tipo_Matricula
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datos = Tipo_Matricula::findOrFail($id);
        return view('tipoMatricula/edit', compact('datos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTipo_MatriculaRequest  $request
     * @param  \App\Models\Tipo_Matricula  $tipo_Matricula
     * @return \Illuminate\Http\Response
     */
    public function update(StoreTipo_MatriculaRequest $request, Tipo_Matricula $tipo_Matricula, $id)
    {
        $datos = request()->except(['_token', '_method']);
        $existeDato = Tipo_Matricula::where('descripcion', $datos)->exists();
        if ($existeDato) {
            return redirect('tmatricula/' . $id . '/edit')->with('mensaje-error', 'ok');
        } else {
            $tipo_Matricula->update($request->validated());
            return redirect('tmatricula')->with('mensaje-editar', 'ok');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tipo_Matricula  $tipo_Matricula
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Tipo_Matricula::destroy($id);
            return redirect('tmatricula/')->with('mensaje-eliminar', 'ok');
        } catch (\Throwable $th) {
            return redirect('tmatricula')->with('mensaje-error-eliminar', 'ok');
        }
    }
    public function search(Request $request)
    {
        if (!isset($request->term)) {
            return [
                'data' => [],
            ];
        }

        $results = Tipo_Matricula::query()
            ->where('descripcion', 'like', '%' . $request->term . '%')
            ->select('id', 'descripcion')
            ->get();

        return new TipoMatriculaCollection($results);
    }
}
