<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Models\Profession;

use App\Models\Tutore;
use Illuminate\Http\Request;

class TutoreController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:tutores.index')->only('index', 'show');
        $this->middleware('can:tutores.edit')->only('edit', 'update');
        $this->middleware('can:tutores.create')->only('create', 'store');
        $this->middleware('can:tutores.destroy')->only('destroy');
    }
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
            ->paginate(10);

        return view('tutores/index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $professions = Profession::all();
        return view('tutores/create', compact('professions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTutoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'nombre' => 'required|string|max:100',
                'apellido' => 'required|string|max:100',
                'telefono' => 'required|string|max:12',
                'cedula' => 'required|string|max:16',
                'professions_id' => 'required',
            ],

            [
                'nombre.required' => 'El nombre es obligatorio.',
                'apellido.required' => 'El apellido es obligatorio.',
                'telefono.required' => 'El numero telefono es obligatorio.',
                'cedula.required' => 'El numero cedula es obligatorio.',
                'professions_id.required' => 'La profesion es obligatoria.',
            ]
        );

        $datos = request()->except('_token');

        $existeDato = Tutore::where('cedula', $datos['cedula'])->exists();
        if ($existeDato) {
            return redirect('tutores/create')->with('mensaje-error', 'ok');
        } else {
            Tutore::insert($datos);
            return redirect('tutores/')->with('mensaje', 'ok');
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tutore  $tutore
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $datos['tutores'] = Tutore::findOrFail($id)
            ->with(['professions'])
            ->paginate(10);
        $tutores = Tutore::findOrFail($id);
        return view('tutores/perfil', compact('tutores'));
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
        $professions = Profession::all();
        return view('tutores/edit', [
            'datos' => $datos,
            'professions' => $professions,
        ]);
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
        $request->validate(
            [
                'nombre' => 'required|string|max:100',
                'apellido' => 'required|string|max:100',
                'telefono' => 'required|string|max:12',
                'cedula' => 'required|string|max:16',
                'professions_id' => 'required',
            ],

            [
                'nombre.required' => 'El nombre es obligatorio.',
                'apellido.required' => 'El apellido es obligatorio.',
                'telefono.required' => 'El numero telefono es obligatorio.',
                'cedula.required' => 'El numero cedula es obligatorio.',
                'professions_id.required' => 'La profesion es obligatoria.',
            ]
        );
        $datos = request()->except(['_token','_method']);
$existeDato =  Tutore::where('cedula', $datos['cedula'])->where('id', '!=', $id)->exists();
if ($existeDato) {
    return redirect('tutores/'.$id.'/edit')->with('mensaje-error', 'ok');
} else {
    Tutore::where('id','=',$id)->update($datos);
    $datos = Tutore::findOrFail($id);
    return redirect('tutores')->with('mensaje-editar','ok');
}


        //$datos = request()->except(['_token','_method']);
        
        //$existeDato =  Tutore::where('cedula', $datos)->exists();
        //if ($existeDato) {
            //return redirect('tutores/'.$id.'/edit')->with('mensaje-error', 'ok');
     //   } else {
       //     Tutore::where('id','=',$id)->update($datos);
        //    $datos =  Tutore::findOrFail($id);
        //    return redirect('tutores')->with('mensaje-editar','ok');
       // }

        

       // $datos = request()->except(['_token', '_method']);

        //Tutore::where('id', '=', $id)->update($datos);
        //$datos = Tutore::findOrFail($id);

       // return redirect('tutores')->with('mensaje-editar', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tutore  $tutore
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $estudiante = Estudiante::exists($id);
        if ($estudiante) {
            return redirect('tutores/')->with('mensaje-error-eliminar', 'ok');
        } else {
            Tutore::destroy($id);
            return redirect('tutores/')->with('mensaje-eliminar', 'ok');
        }
    }
}
