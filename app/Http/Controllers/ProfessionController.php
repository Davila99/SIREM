<?php

namespace App\Http\Controllers;

use App\Models\Profession;
use Illuminate\Http\Request;




class ProfessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['professions'] = Profession::paginate(10);
        return view('profession/index',$datos);
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
    public function store(Request $request)
    {    $request->validate(
        [
            'descripcion' => 'required',
        ],
        [
            'descripcion.required' => 'El campo es obligatorio.',
        ]
    );
        $datos = request()->except('_token');
        Profession::insert($datos);
        return redirect('profession/')->with('mensaje','ok');
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
        return view('profession/edit',compact('datos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profession  $profession
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {    $request->validate(
        [
            'descripcion' => 'required',
        ],
        [
            'descripcion.required' => 'El campo es obligatorio.',
        ]
    );
        $datos = request()->except(['_token', '_method']);
        Profession::where('id', '=', $id)->update($datos);
        $datos = Profession::findOrFail($id);
        return redirect('profession')->with('mensaje-editar','ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profession  $profession
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        
        try {
            Profession::destroy($id);
            return redirect('profession')->with('mensaje-eliminar','ok');
        } catch (\Throwable $th) {

            return redirect('profession')->with('mensaje-error-eliminar','ok');
        }
 
    }
}
