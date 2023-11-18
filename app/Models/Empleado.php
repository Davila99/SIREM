<?php

namespace App\Models;

use App\Models\Niveles_academico;
use App\Models\Cargo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombres',
        'apellidos',
        'cedula',
        'fecha_nacimiento',
        'edad',
        'direccion',
        'telefono',
        'email',
        'nivel_academico_id',
        'cargos_id',
        'user_id',
    ];

    public function nivel_academico()
    {
        return $this->belongsTo(Niveles_academico::class,'nivel_academico_id','id');
    }
    public function cargos()
    {
        return $this->belongsTo(Cargo::class,'cargos_id','id');
    }

    public function user()
     {
         return $this->belongsTo(User::class);
     }
}
