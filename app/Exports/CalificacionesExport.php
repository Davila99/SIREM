<?php

namespace App\Exports;

use App\Models\Calificaciones;
use Maatwebsite\Excel\Concerns\FromCollection;

class CalificacionesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Calificaciones::all();
    }
}
