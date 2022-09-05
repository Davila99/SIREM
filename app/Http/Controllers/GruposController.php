<?php

namespace App\Http\Controllers;

use App\Models\Grupos;
use App\Http\Requests\StoreGruposRequest;
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
        ->with(['grados'])
        ->with(['empleados'])
        ->paginate(3);

    return view('grupos/index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $grados = Grado::all();
        $empleados = Empleado::all();

        return view('grupos/create',compact('grados'),compact('empleados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreGruposRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGruposRequest $request)
    {
        $datos = request()->except('_token');
        Grupos::insert($datos);
        return redirect('grupos/')->with('mensaje', 'grupo agregado con exito');
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
        $empleados = Empleado::all();
       
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
        $datos = Grado::findOrFail($id);
        return view('grupos.edit', compact('datos'));
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
        return redirect('grupos/')->with('mensaje', ' Eliminado con exito');
    }
}
