<?php

namespace App\Models;

use App\Models\Sexo;
use App\Models\Tutore;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Estudiante extends Model
{
    protected $fillable = [
        'nombres',
        'apellidos',
        'codigo_estudiante',
        'fecha_nacimiento',
        'edad',
        'direccion',
        'tutor_id',
        'sexo_id',
    ];
    use HasFactory;
    public function tutor()
    {
        return $this->belongsTo(Tutore::class);
    }
    public function sexo()
    {
        return $this->belongsTo(Sexo::class);
    }
    public function matricula()
    {
        return $this->belongsTo(Matricula::class);
    }
    public function calificaciones()
    {
        return $this->hasMany(Calificaciones::class, 'estudiante_id');
    }
}
