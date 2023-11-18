<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ActaCalificacionFinalRequest;
use App\Http\Controllers\ActaCalificacionFinalController;

class PdfActaCalificacionFinalController extends Controller
{
    public function index(ActaCalificacionFinalRequest $request)
    {
        $data = app(ActaCalificacionFinalController::class)->getData(
            $request->asignatura_id,
            $request->grupo_id
        );

        dd($data);
    }
}
