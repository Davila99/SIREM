<?php

namespace App\Http\Controllers;

use App\Models\Profession;
use App\Models\Tutore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TutoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['tutores'] = Tutore::query()
        ->with(['professions'])
        ->orderBy('nombre', 'asc')
        ->paginate(3);

    return view('tutores/index', $datos,$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $professions = Profession::all();
        return view('tutores/create',compact('professions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTutoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campos =
        [
            'nombre' => 'required|string|max:100',
            'apellido' => 'required|string|max:100',
            'telefono' => 'required|string|max:12',
            'cedula' => 'required|string|max:16',

        ];
    $mensaje = [
        'required' => 'El :attribute es requerido',
        'cedula.required' => 'La cedula es requerida'
    ];

    $this->validate($request, $campos, $mensaje);
    $datos = request()->except('_token');
    if ($request->hasFile('cedula')) {
        $datos['cedula'] = $request->file('cedula')->store('uploads', 'public');
    }

    Tutore::insert($datos);
    return redirect('tutores/')->with('mensaje', 'Tutor agregado con exito');
}
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tutore  $tutore
     * @return \Illuminate\Http\Response
     */
    public function show(Tutore $tutore)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tutore  $tutore
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datos = Tutore::findOrFail($id);
        return view('tutores/edit', compact('datos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTutoreRequest  $request
     * @param  \App\Models\Tutore  $tutore
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos =
        [
            'nombre' => 'required|string|max:100',
            'apellido' => 'required|string|max:100',
            'telefono' => 'required|string|max:12',
            'cedula' => 'required|string|max:16',

        ];

    $mensaje = [
        'required' => 'El :attribute es requerido',

    ];
    if ($request->hasFile('cedula')) {
        $campos = ['cedula' => 'required|max:10000'];
        $mensaje = ['cedula.required' => 'La cedula  es requerida'];
    }
    $this->validate($request, $campos, $mensaje);

    //excluimos el token y la infromacion de method
    $datos = request()->except(['_token', '_method']);

    //condicionamos y comparamos que esi el id que estamos enviando
    if ($request->hasFile('cedula')) {
        $tutore = Tutore::findOrFail($id);

        Storage::delete('public/' . $tutore->cedula);
        $datos['cedula'] = $request->file('cedula')->store('uploads', 'public');
    }
    //es identico al que esta en los resgitros de la base de datos y guarda los nuevos cambios
    Tutore::where('id', '=', $id)->update($datos);
    $datos = Tutore::findOrFail($id);


    return redirect('tutores')->with('mensaje-editar', 'Tutor editado con exito');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tutore  $tutore
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tutore::destroy($id);
        return redirect('tutores/')->with('mesaje-eliminar', 'Tutor Eliminado con exito');
    }
}
