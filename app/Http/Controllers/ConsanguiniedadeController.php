<?php

namespace App\Http\Controllers;

use App\Models\Consanguiniedade;
use Illuminate\Http\Request;

class ConsanguiniedadeController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:consanguiniedades.index')->only('index');
        $this->middleware('can:consanguiniedades.edit')->only('edit','update');
        $this->middleware('can:consanguiniedades.show')->only('show');
        $this->middleware('can:consanguiniedades.create')->only('create','store');
        $this->middleware('can:consanguiniedades.destroy')->only('destroy');
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['consanguiniedades'] = Consanguiniedade::paginate(10);
        return view('consanguiniedad/index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('consanguiniedad/create');
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
        Consanguiniedade::insert($datos);
        return redirect('consanguiniedades/')->with('mensaje', 'ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Consanguiniedade  $consanguiniedade
     * @return \Illuminate\Http\Response
     */
    public function show(Consanguiniedade $consanguiniedade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Consanguiniedade  $consanguiniedade
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datos = Consanguiniedade::findOrFail($id);
        return view('consanguiniedad/edit', compact('datos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Consanguiniedade  $consanguiniedade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'descripcion' => 'required',
            ],
            [
                'descripcion.required' => 'El campo es obligatorio.',
            ]
        );
        $datos = request()->except(['_token', '_method']);

        Consanguiniedade::where('id', '=', $id)->update($datos);

        $datos = Consanguiniedade::findOrFail($id);
        return redirect('consanguiniedades')->with('mensaje-editar', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Consanguiniedade  $consanguiniedade
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Consanguiniedade::destroy($id);
        return redirect('consanguiniedades/')->with('mensaje-eliminar', 'ok');
    }
}
