<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalificacionDetalle extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class);
    }
    public function corteEvaluativo()
    {
        return $this->belongsTo(Cortes_evaluativo::class);
    }

    public function cabecera()
    {
        return $this->belongsTo(Calificaciones::class, 'calificacion_id');
    }

    public static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            $model->calificacion_cualitativa = self::getCalificacionCualitativa($model->calificacion);
        });
    }

    public static function getCalificacionCualitativa($calificacion)
    {
        if ($calificacion >= 0 && $calificacion <= 59) {
            return 'AI';
        }
        if ($calificacion >= 60 && $calificacion <= 75) {
            return 'AE/AF';
        }
        if ($calificacion >= 76 && $calificacion <= 89) {
            return 'AS';
        }
        if ($calificacion >= 90 && $calificacion <= 100) {
            return 'AA';
        }
    }

}
