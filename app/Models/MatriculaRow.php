<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatriculaRow extends Model
{
    use HasFactory;
    protected $fillable = [
        'matricula_id',
        'asignatura_docente_id',
    ];
    public function asignaturaDocente()
    {
        return $this->belongsTo(AsignaturaDocente::class);
    }
    public function matricula()
    {
        return $this->belongsTo(Matricula::class);
    }
}
