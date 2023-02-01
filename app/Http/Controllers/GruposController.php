<?php

namespace App\Http\Controllers;

use App\Models\Grupos;

use App\Http\Resources\GrupoCollection;
use Illuminate\Http\Request;
use App\Models\Empleado;
use App\Models\Grado;


class GruposController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $datos['grupos'] =Grupos::query()
        ->with(['grado'])
        ->with(['empleado'])
        ->paginate(10);
        //return dd($datos);
        return view('grupos/index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $grados = Grado::all();
        $empleados = Empleado::where('cargos_id', 1)->get();
      
        
        return view('grupos/create', compact('grados'), compact('empleados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreGruposRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $fecha = date('d-m-Y');
        $grupo = new Grupos();
        $grupo->grado_id = $request->grado_id;
        $grupo->fecha = $fecha;
        $grupo->empleados_id = $request->empleados_id;
        $grupo->save();
        return redirect('grupos/')->with('mensaje', 'Grupo agregado con exito');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Grupos  $grupos
     * @return \Illuminate\Http\Response
     */
    public function show(Grupos $grupos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Grupos  $grupos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datos = Grupos::findOrFail($id);
        $grados = Grado::all();
        $empleados = Empleado::where('cargos_id',1)->get();
       
        return view('grupos/edit',["datos"=>$datos,"grados"=>$grados,"empleados"=>$empleados]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGruposRequest  $request
     * @param  \App\Models\Grupos  $grupos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datos = request()->except(['_token', '_method']);
        Grupos::where('id', '=', $id)->update($datos);
        $datos = Grupos::findOrFail($id);
        return redirect('grupos/')->with('mensaje', 'Grupo editado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Grupos  $grupos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Grupos::destroy($id);
        return redirect('grupos/')->with('mesajeerror', ' Eliminado con exito');
    }

    public function search(Request $request)
    {

        if (!isset($request->term)) {
            return [
                'data' => []
            ];
        }


        $results = Grupos::query()
            ->with('grado','empleado')
            ->whereHas('grado', function ($q) use ($request) {
                $q->where('descripcion', 'like', "%" . $request->term . "%");
            })
            
            ->get();

            return new GrupoCollection($results);
       
    }
}
