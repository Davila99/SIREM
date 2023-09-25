<?php

namespace App\Exports;

use App\Models\Calificaciones;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;

class CalificacionesExport implements FromQuery
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;

    protected $acta;

    public function __construct($acta)
    {
        $this->acta = $acta;
    }

    public function query()
    {
        
        return Calificaciones::where('id', $this->acta->id);
    }
}
