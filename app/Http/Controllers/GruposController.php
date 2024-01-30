<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGruposRequest;
use App\Http\Resources\GrupoCollection;
use App\Models\Empleado;
use App\Models\Grado;
use App\Models\Grupos;
use App\Models\Seccion;
use App\Models\Turno;
use Illuminate\Http\Request;

class GruposController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:grupos.index')->only('index', 'show');
        $this->middleware('can:grupos.edit')->only('edit', 'update');
        $this->middleware('can:grupos.create')->only('create', 'store');
        $this->middleware('can:grupos.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request  $request)
    {
        $yearFilter = $request->input('year');
        $datos['grupos'] = Grupos::query()
            ->with(['grado'])
            ->with(['empleado'])
            ->with(['seccion'])
            ->with(['turno'])
            ->when($yearFilter, function ($query) use ($yearFilter) {
                return $query->where('anio_lectivo', $yearFilter);
            })->get();
        //  dd($datos);
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
        $secciones = Seccion::all();
        $turnos = Turno::all();
        $empleados = Empleado::where('cargos_id', 1)->get();

        return view(
            'grupos/create',
            compact('grados', 'empleados', 'secciones', 'turnos')
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreGruposRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGruposRequest $request)
    {
        $existeDato = Grupos::where('grado_id', $request->grado_id)
            ->where('anio_lectivo', $request->anio_lectivo)
            ->exists();
        if ($existeDato) {
            return redirect('grupos/create')->with('mensaje-error', 'ok');
        } else {
            $grupo = new Grupos();
            $grupo->grado_id = $request->grado_id;
            $grupo->anio_lectivo = $request->anio_lectivo;
            $grupo->empleado_id = $request->empleado_id;
            $grupo->seccion_id = $request->seccion_id;
            $grupo->turno_id = $request->turno_id;
            $grupo->save();
            return redirect('grupos/')->with('mensaje', 'ok');
        }
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
        $secciones = Seccion::all();
        $turnos = Turno::all();
        $empleados = Empleado::where('cargos_id', 1)->get();

        return view('grupos/edit', [
            'datos' => $datos,
            'grados' => $grados,
            'empleados' => $empleados,
            'secciones' => $secciones,
            'turnos' => $turnos,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGruposRequest  $request
     * @param  \App\Models\Grupos  $grupos
     * @return \Illuminate\Http\Response
     */
    public function update(StoreGruposRequest $request, $id)
    {
        $existeDato = Grupos::where('grado_id', $request->grado_id)
            ->where('anio_lectivo', $request->anio_lectivo)
            ->exists();

        if ($existeDato) {
            return redirect('grupos/' . $id . '/edit')->with(
                'mensaje-error',
                'ok'
            );
        } else {
            $datos = request()->except(['_token', '_method']);
            Grupos::where('id', '=', $id)->update($datos);
            $datos = Grupos::findOrFail($id);
            return redirect('grupos/')->with('mensaje-editar', 'ok');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Grupos  $grupos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Grupos::destroy($id);
            return redirect('grupos/')->with('mensaje-eliminar', 'ok');
        } catch (\Throwable $th) {
            return redirect('grupos')->with('mensaje-error-eliminar', 'ok');
        }
        
    }

    public function search(Request $request)
    {
        if (!isset($request->term)) {
            return [
                'data' => [],
            ];
        }

        $results = Grupos::query()
            ->with('grado', 'empleado')
            ->whereHas('grado', function ($q) use ($request) {
                $q->where('descripcion', 'like', '%' . $request->term . '%');
            })

            ->get();

        return new GrupoCollection($results);
    }
}
