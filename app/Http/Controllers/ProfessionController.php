<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfessionRequest;
use App\Models\Profession;


class ProfessionController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:profession.index')->only('index', 'show');
        $this->middleware('can:profession.edit')->only('edit', 'update');
        $this->middleware('can:profession.create')->only('create', 'store');
        $this->middleware('can:profession.destroy')->only('destroy');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['professions'] = Profession::get();
        return view('profession/index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profession/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProfessionRequest $request)
    {
        $datos = request()->except('_token');
        $array = implode($datos);
        $existeDato = Profession::where('descripcion', 'like', '%' . $array . '%')->exists();
        if ($existeDato) {
            return redirect('profession/create')->with('mensaje-error', 'ok');
        } else {
            Profession::insert($datos);
            return redirect('profession/')->with('mensaje', 'ok');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profession  $profession
     * @return \Illuminate\Http\Response
     */
    public function show(Profession $profession)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profession  $profession
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datos = Profession::findOrFail($id);
        return view('profession/edit', compact('datos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profession  $profession
     * @return \Illuminate\Http\Response
     */
    public function update(ProfessionRequest $request,Profession $profession)
    {
      
        $datos = request()->except(['_token', '_method']);  
        $existeDato = Profession::where('descripcion', $datos)->exists();
        if ($existeDato) {
            return redirect('profession/' . $profession->id . '/edit')->with('mensaje-error', 'ok');
        } else {
            $profession->update($request->validated());
            return redirect('profession')->with('mensaje-editar', 'ok');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profession  $profession
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        try {
            Profession::destroy($id);
            return redirect('profession')->with('mensaje-eliminar', 'ok');
        } catch (\Throwable $th) {

            return redirect('profession')->with('mensaje-error-eliminar', 'ok');
        }

    }
}
