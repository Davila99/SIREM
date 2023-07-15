<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateSeccionRequest;
use App\Models\Seccion;
use Illuminate\Http\Request;

class SeccionController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:seccion.index')->only('index', 'show');
        $this->middleware('can:seccion.edit')->only('edit', 'update');
        $this->middleware('can:seccion.create')->only('create', 'store');
        $this->middleware('can:seccion.destroy')->only('destroy');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['secciones'] = Seccion::paginate(10);
        return view('seccion/index', $datos);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('seccion/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSeccionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => 'required',
        ],
            [
                'descripcion.required' => 'El campo es obligatorio.',
            ]
        );
        $datos = request()->except('_token');
        $existeDato = Seccion::where('descripcion', $datos)->exists();
        if ($existeDato) {
            return redirect('seccion/create')->with('mensaje-error', 'ok');
        } else {
            Seccion::insert($datos);
            return redirect('seccion/')->with('mensaje', 'ok');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Seccion  $seccion
     * @return \Illuminate\Http\Response
     */
    public function show(Seccion $seccion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Seccion  $seccion
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datos = Seccion::findOrFail($id);
        return view('seccion/edit', compact('datos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSeccionRequest  $request
     * @param  \App\Models\Seccion  $seccion
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
        $existeDato = Seccion::where('descripcion', $datos)->exists();
        if ($existeDato) {
            return redirect('seccion/' . $id . '/edit')->with('mensaje-error', 'ok');
        } else {
            Seccion::where('id', '=', $id)->update($datos);
            $datos = Seccion::findOrFail($id);
            return redirect('seccion')->with('mensaje-editar', 'ok');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Seccion  $seccion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Seccion::destroy($id);
            return redirect('seccion')->with('mensaje-eliminar', 'ok');
        } catch (\Throwable $th) {

            return redirect('seccion')->with('mensaje-error-eliminar', 'ok');
        }
    }
}
