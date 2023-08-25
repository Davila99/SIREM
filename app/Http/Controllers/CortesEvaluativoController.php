<?php

namespace App\Http\Controllers;

use App\Models\Cortes_evaluativo;
use Illuminate\Http\Request;

class CortesEvaluativoController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:cevaluativos.index')->only('index', 'show');
        $this->middleware('can:cevaluativos.edit')->only('edit', 'update');
        $this->middleware('can:cevaluativos.create')->only('create', 'store');
        $this->middleware('can:cevaluativos.destroy')->only('destroy');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['cortes_evaluativos'] = Cortes_evaluativo::get();
        return view('cortes/index', $datos);
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
        $request->validate(
            [
                'descripcion' => 'required',
            ],
            [
                'descripcion.required' => 'El campo es obligatorio.',
            ]
        );
        $datos = request()->except('_token');
        $existeDato = Cortes_evaluativo::where('descripcion', $datos)->exists();
        if ($existeDato) {
            return redirect('cevaluativos/create')->with('mensaje-error', 'ok');
        } else {
            Cortes_evaluativo::insert($datos);
            return redirect('cevaluativos/')->with('mensaje', 'ok');
        }
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
        $request->validate([
            'descripcion' => 'required',
        ],
            [
                'descripcion.required' => 'El campo es obligatorio.',
            ]
        );
        $datos = request()->except(['_token', '_method']);
        $existeDato = Cortes_evaluativo::where('descripcion', $datos)->exists();
        if ($existeDato) {
            return redirect('cevaluativos/' . $id . '/edit')->with('mensaje-error', 'ok');
        } else {
            Cortes_evaluativo::where('id', '=', $id)->update($datos);
            $datos = Cortes_evaluativo::findOrFail($id);
            return redirect('cevaluativos')->with('mensaje-editar', 'ok');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cortes_evaluativo  $cortes_evaluativo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        try {
            Cortes_evaluativo::destroy($id);
            return redirect('cevaluativos/')->with('mensaje-eliminar', 'ok');
        } catch (\Throwable $th) {
            return redirect('grados')->with('mensaje-error-eliminar', 'ok');
        }

    }
}
