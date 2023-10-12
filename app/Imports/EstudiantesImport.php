<?php

namespace App\Imports;

use App\Models\Estudiante;
use Maatwebsite\Excel\Concerns\ToModel;

class EstudiantesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Estudiante([
            'id' => $row[0],
            'nombres' => $row[1],
            'apellidos' => $row[2],
            'codigo_estudiante' => $row[3],
        ]);
    }
}
