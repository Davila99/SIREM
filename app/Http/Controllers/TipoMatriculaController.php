<?php

namespace App\Http\Controllers;

use App\Http\Resources\GrupoCollection;
use App\Http\Resources\TipoMatriculaCollection;
use App\Models\Tipo_Matricula;

use Illuminate\Http\Request;
class TipoMatriculaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['tipo__matriculas'] =  Tipo_Matricula::paginate(10);
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
    public function store(Request $request)
    {
        $datos = request()->except('_token');
        Tipo_Matricula::insert($datos);
        return redirect('tmatricula/')->with('mensaje','tipo de matricula agregada');
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
    public function update(Request $request, $id)
    {
        $datos = request()->except(['_token', '_method']);

        Tipo_Matricula::where('id', '=', $id)->update($datos);

        $datos = Tipo_Matricula::findOrFail($id);
        return view('tipoMatricula.edit', compact('datos'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tipo_Matricula  $tipo_Matricula
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tipo_Matricula::destroy($id);
        return redirect('tmatricula/')->with('mensaje', 'Cargos eliminado con exito');
    }
    public function search(Request $request)
    {

        if (!isset($request->term)) {
            return [
                'data' => []
            ];
        }

        $results = Tipo_Matricula::query()
            ->where('descripcion', 'like', "%" . $request->term . "%")
            ->select('id', 'descripcion')
            ->get();

        return new TipoMatriculaCollection($results);
    }

}
