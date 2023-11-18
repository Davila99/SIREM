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
            'nombres' => trim($row['nombres']),
            'apellidos' => trim($row['apellidos']),
            'codigo_estudiante' => trim($row['codigo_estudiante']),
        ]);
    }
}
