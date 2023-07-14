<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalificacionDetalle extends Model
{
    use HasFactory;

    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class);
    }
    public function corteEvaluativo()
    {
        return $this->belongsTo(Cortes_evaluativo::class);
    }

}
