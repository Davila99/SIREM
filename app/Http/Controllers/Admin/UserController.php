<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Empleado;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
    }

    public function Changepassword(Request $request)
    {
        $request->validate(
            [
                'current_password' => 'required|string|max:100',
                'new_password' => 'required|string|max:100',
                'confirm_password' => 'required|string|max:100',
            ],

            [
                'current_password.required' => 'La contraseña actual es obligatoria.',
                'new_password.required' => 'La nueva contraseña es obligatoria.',
                'confirm_password.required' => 'La confirmación de la contraseña es obligatoria.',
            ]       
        );
            if (!Auth::check()) {
                return redirect()->back()->with('error', 'Usuario no autenticado.');
            }

            $user = User::find(Auth::id());
            if (!Hash::check($request->current_password, $user->password)) {
                return redirect()->back()->with('error-current_password', 'ok');
            }
    
            if ($request->new_password !== $request->confirm_password) {
                return redirect()->back()->with('error-validatio-password', 'ok');
            }
    

            $user->update([
                'password' => Hash::make($request->new_password),
            ]);
    
            return redirect()->back()->with('mensaje', 'ok');
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
                'name' => 'required|string|max:100',
                'email' => 'required|string|max:100',
                'empleado_id' => 'required',
            ],

            [
                'name.required' => 'El nombre es obligatorio.',
                'email.required' => 'El email es obligatorio.',
                'empleado_id.required' => 'La empleado es obligatoria.',
            ]
        );
        $datos = request()->except('_token');
        $existeDato = User::where('email', $datos['email'])
            ->orwhere('empleado_id', $datos['empleado_id'])
            ->exists();
        if ($existeDato) {
            return redirect('users/create')->with('mensaje-error', 'ok');
        } else {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->empleado_id = $request->empleado_id;
            $user->save();
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
    }
    public function editUser($id)
    {
        $datos = User::findOrFail($id);
        $empleados = Empleado::all();
        return view('user/edit', compact('datos', 'empleados'));
    }
    public function updateUser(Request $request, $id)
    {
        dd($request->all());
        $request->validate(
            [
                'name' => 'required|string|max:100',
                'email' => 'required|string|max:100',
                'empleado_id' => 'required',
                'current_password' => 'required|string|max:100',
            ],

            [
                'name.required' => 'El nombre es obligatorio.',
                'email.required' => 'El email es obligatorio.',
                'empleado_id.required' => 'La empleado es obligatoria.',
                'current_password.required' => 'La contraseña es obligatoria.',
            ]
        );
        $datos = request()->except('_token');
        $existeDato = User::where('email', $datos['email'])
            ->orwhere($id, $datos[$id])
            ->exists();
        if ($existeDato) {
            return redirect('users/create')->with('mensaje-error', 'ok');
        } else {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->empleado_id = $request->empleado_id;
            $user->save();
            return redirect('users/')->with('mensaje', 'ok');
        }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateRoles(Request $request, User $user)
    {
        $user->roles()->sync($request->roles);

        return redirect()
            ->route('users.edit', $user)
            ->with('mensaje', 'ok');
    }
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
        // dd($user);
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
        User::destroy($id);
        return redirect('users/')->with('mensaje-eliminar', 'ok');
    }
}
