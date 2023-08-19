<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\User;
use Spatie\FlareClient\View;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $perfil  = User::query()
        ->with(['empleado'])
        ->where('empleado_id', auth()->id())
        ->first();
        // dd($perfil);
        return view('perfil/index',compact('perfil'));
    }
}
