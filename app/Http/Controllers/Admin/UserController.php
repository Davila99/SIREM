<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Empleado;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $search;

    public function index()
    {
        return view('admin/users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empleados = Empleado::all();
        $roles = Role::all();

        return view('user/create', compact('empleados', 'roles'));
        // return view('user/create');
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
                'nombres' => 'required|string|max:100',
                'apellidos' => 'required|string|max:100',
                'empleado_id' => 'required',
            ],

            [
                'nombres.required' => 'El nombre es obligatorio.',
                'apellidos.required' => 'El apellido es obligatorio.',
                'empleado_id.required' => 'La profesion es obligatoria.',
            ]
        );

        $datos = request()->except('_token');

        $existeDato = Empleado::where('nombres', $datos['nombre'])
            ->orwhere('apellidos', $datos['apellidos'])
            ->orwhere('cedula', $datos['cedula'])
            ->exists();
        if ($existeDato) {
            return redirect('users/create')->with('mensaje-error', 'ok');
        } else {
            Empleado::insert($datos);
            return redirect('users/')->with('mensaje', 'ok');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin/users.edit', compact('user', 'roles'));
        // return 'En desarrollo...';
    }
    // public function editRoles(User $user)
    // {
    //     $roles = Role::all();
    //     return view('admin/users.edit', compact('user', 'roles'));

    //     return 'En desarrollo';
    // }
    // public function updateRoles(Request $request,User $user)
    // {
    //     $user->roles()->sync($request->roles);
    //     return redirect()->route('users.edit',$user)->with('mensaje', 'ok');

    // }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->roles()->sync($request->roles);
        return redirect()
            ->route('users.edit', $user)
            ->with('mensaje', 'ok');
        // return 'Funcianando';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
