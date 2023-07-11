<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calificaciones extends Model
{
    protected $fillable = [
        'fecha',
        'empleado_id',
        'asignatura_id',
        'observaciones',
        'corte',
    ];
    use HasFactory;
    public function asignaturadocente()
    {
        return $this->belongsTo(AsignaturaDocente::class);
    }
    public function asignatura()
    {
        return $this->belongsTo(Asignatura::class);
    }
    public function grado()
    {
        return $this->belongsTo(Grado::class);
    }
    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class);
    }
    public function cortes_evaluativo()
    {
        return $this->belongsTo(Cortes_evaluativo::class);
    }
}
