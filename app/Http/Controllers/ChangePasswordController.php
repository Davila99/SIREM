<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class ChangePasswordController extends Controller
{
    public function changePassword(Request $request)
    {
        // Asegúrate de que el usuario esté autenticado
        if (!Auth::check()) {
            return redirect()->back()->with('error', 'Usuario no autenticado.');
        }

        $user = Auth::user();

        // Validar la contraseña actual
        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->with('error', 'La contraseña actual es incorrecta.');
        }

        // Validar que la nueva contraseña y la confirmación coincidan
        if ($request->new_password !== $request->confirm_password) {
            return redirect()->back()->with('error', 'Las contraseñas no coinciden.');
        }

        // Cambiar la contraseña del usuario
        $user->update([
            'password' => Hash::make($request->new_password),
        ]);

        return redirect()->back()->with('success', 'Contraseña cambiada con éxito.');
    }
}
