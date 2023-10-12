<?php

namespace App\Imports;

use App\Models\Estudiante;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EstudiantesImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Estudiante([
            'id' => $row['id'],
            'nombres' => $row['nombres'],
            'apellidos' => $row['apellidos'],
            'codigo_estudiante' => $row['codigo_estudiante'],
        ]);
    }
}
