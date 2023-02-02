<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grado extends Model
{
    use HasFactory;

    // public function gradoGrupo()
    // {
    //     return $this->hasOneThrough(
    //         AsignaturaDocente::class,
    //         Grupos::class,
    //         'grado_id',
    //         'grupo_id',
    //         'id',
    //         'id');
    // }
    public function grupo()
    {
        return $this->belongsTo(Grupos::class);
    }
}
