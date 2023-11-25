<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMatriculaRequest;
use App\Http\Requests\UpdateMatriculaRequest;
use App\Models\Estudiante;
use App\Models\Grupos;
use App\Models\Matricula;
use App\Models\Tipo_Matricula;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Dompdf;

class MatriculaController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:matriculas.index')->only('index', 'show');
        $this->middleware('can:matriculas.edit')->only('edit', 'update');
        $this->middleware('can:matriculas.create')->only('create', 'store');
        $this->middleware('can:matriculas.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos['matriculas'] = Matricula::query()
            ->with(['estudiante'])
            ->with(['tipo_matricula'])
            ->with(['grupo'])
            ->with(['user'])
            ->get();

        // dd($datos);
        return view('matriculas/index', $datos);
    }
    public function busqueda()
    {
        return view('matriculas.busqueda');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $tipoMatriculas = Tipo_Matricula::all();
        $grupos = Grupos::all();
        return view('matriculas/create',compact('tipoMatriculas','grupos'));
    }
    public function pdf($id)
    {
        try {
            $matriculas = Matricula::findOrFail($id);
            $pdf = PDF::loadView(
                'matriculas.pdf',
                compact('matriculas')
            )->setPaper('letter');

            return $pdf->stream('matriculas.pdf', ['Attachment' => true]);
        } catch (\Exception $e) {
            return redirect('matriculas/')->with('mensaje-error-pdf', 'ok');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMatriculaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMatriculaRequest $request)
    {  
        $fecha = date('d-m-Y');
        $existe = Matricula::where('estudiante_id', $request->estudiante_id)
        ->where('fecha', '=', $fecha)
        ->where('tipo_matricula_id', '=',  $request->tipo_matricula_id) 
        ->where('grupo_id', '=',  $request->grupo_id) 
        ->exists();
        if ($existe) {
            return redirect('matriculas/')->with('mensaje-error', 'ok');
        }else
        {
            $matricula = new Matricula();
            $user_id = auth()->id();
            $matricula->user_id = $user_id;
            $matricula->fecha = $fecha;
            $matricula->estudiante_id = $request->estudiante_id;
            $matricula->tipo_matricula_id = $request->tipo_matricula_id;
            $matricula->grupo_id = $request->grupo_id;
            $matricula->partida_nacimiento = $request->partida_nacimiento;
            $matricula->tarjeta_vacuna = $request->tarjeta_vacuna;
            $matricula->diploma_prescolar = $request->diploma_prescolar;
            $matricula->cedula_padres = $request->cedula_padres;
            $matricula->hoja_traslado = $request->hoja_traslado;
            $matricula->diploma_secundaria = $request->diploma_secundaria;
            $matricula->save();
    
            return redirect('matriculas/')->with('mensaje', 'ok');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Matricula  $matricula
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $matriculas = Matricula::findOrFail($id);
        return view('matriculas/detalles', compact('matriculas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Matricula  $matricula
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datos = Matricula::findOrFail($id);
        $estudiante = Estudiante::all();
        $tipoMatriculas = Tipo_Matricula::all();
        $grupos = Grupos::all();

        return view('matriculas/edit', [
            'datos' => $datos,
            'estudiante' => $estudiante,
            'tipoMatriculas' => $tipoMatriculas,
            'grupos' => $grupos,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMatriculaRequest  $request
     * @param  \App\Models\Matricula  $matricula
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMatriculaRequest $request,Matricula $matricula)
    {
        $matricula->update($request->validated());
        return redirect('matriculas/')->with('mensaje-editar', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Matricula  $matricula
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Matricula::destroy($id);
        return redirect('matriculas/')->with('mensaje-eliminar', 'ok');
    }
}
