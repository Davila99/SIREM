<?php

namespace App\Http\Controllers;

use App\Models\Cortes_evaluativo;
use Illuminate\Http\Request;

class CortesEvaluativoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['cortes_evaluativos'] = Cortes_evaluativo::paginate(10);
        return view('cortes/index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cortes/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datos = request()->except('_token');
        Cortes_evaluativo::insert($datos);
        return redirect('cevaluativos/')->with('mensaje','Corte agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cortes_evaluativo  $cortes_evaluativo
     * @return \Illuminate\Http\Response
     */
    public function show(Cortes_evaluativo $cortes_evaluativo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cortes_evaluativo  $cortes_evaluativo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datos = Cortes_evaluativo::findOrFail($id);
        return view('cortes/edit', compact('datos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cortes_evaluativo  $cortes_evaluativo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datos = request()->except(['_token','_method']);
        Cortes_evaluativo::where('id', '=', $id)->update($datos);
        $datos = Cortes_evaluativo::findOrFail($id);
        return redirect('cevaluativos')->with('mensaje', 'Corte Evaluativo editado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cortes_evaluativo  $cortes_evaluativo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cortes_evaluativo::destroy($id);
        return redirect('cevaluativos/')->with('mesajeerror','Corte eliminado con exito');
    }
}
