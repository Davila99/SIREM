<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupos extends Model
{
    use HasFactory;
    public function grado()
    {
        return $this->belongsTo(Grado::class);
    }
    public function niveles_academico()
    {
        return $this->belongsTo(Niveles_academico::class);
    }
    public function asignaturadocente()
    {
        return $this->belongsTo(AsignaturaDocente::class);
    }

}

