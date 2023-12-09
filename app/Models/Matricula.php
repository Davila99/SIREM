<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'fecha',
        'user_id',
        'estudiante_id',
        'grupo_id',
        'tipo_matricula_id',
        'partida_nacimiento',
        'tarjeta_vacuna',
        'diploma_prescolar',
        'cedula_padres',
        'hoja_traslado',
        'diploma_secundaria',
    ];

    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class);
    }
    public function tipo_matricula()
    {
        return $this->belongsTo(Tipo_Matricula::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function empleado()
    {
        return $this->hasOneThrough(
            Empleado::class,
            Grupos::class,
            'empleado_id',
            'id',
            'grupo_id',
            'id'
        );
    }
    public function grupo()
    {
        return $this->belongsTo(Grupos::class, 'grupo_id');
    }
    public function grado()
    {
        return $this->hasOneThrough(
            Grado::class,
            Grupos::class,
            'grado_id',
            'id',
            'grupo_id',
            'id'
        );
    }
    public function seccion()
    {
        return $this->hasOneThrough(
            Seccion::class,
            Grupos::class,
            'seccion_id',
            'id',
            'grupo_id',
            'id'
        );
    }
    public function turno()
    {
        return $this->hasOneThrough(
            Turno::class,
            Grupos::class,
            'turno_id',
            'id',
            'grupo_id',
            'id'
        );
    }
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function matriculaRows()
    {
        return $this->hasMany(MatriculaRow::class);
    }
}
