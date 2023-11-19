<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConsanguiniedadRequest;
use App\Models\Consanguiniedade;
use Illuminate\Http\Request;

class ConsanguiniedadeController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:consanguiniedades.index')->only('index', 'show');
        $this->middleware('can:consanguiniedades.edit')->only('edit', 'update');
        $this->middleware('can:consanguiniedades.create')->only('create', 'store');
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
    public function store(ConsanguiniedadRequest $request)
    {
    
        $datos = request()->except('_token');

        $existeDato = Consanguiniedade::where('descripcion', $datos)->exists();
        if ($existeDato) {
            return redirect('consanguiniedades/create')->with('mensaje-error', 'ok');
        } else {
            Consanguiniedade::insert($datos);
            return redirect('consanguiniedades/')->with('mensaje', 'ok');
        }
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
    public function update(ConsanguiniedadRequest $request,Consanguiniedade $consanguiniedad)
    {
   
        $existeDato = Consanguiniedade::where('descripcion', $request)->exists();
        if ($existeDato) {
            return redirect('consanguiniedades/' . $consanguiniedad . '/edit')->with('mensaje-error', 'ok');
        } else {
            $consanguiniedad->update($request->validated());
            return redirect('consanguiniedades')->with('mensaje-editar', 'ok');
        }
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
